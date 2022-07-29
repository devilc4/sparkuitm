<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['EMPLOYEE_ID'])){
	header('localhost:index.php');
	}

function checkTrackingNo($conn,$trackingNo)
{
    $found = false;
    $sql = "SELECT TRACKING_NO FROM PARCEL WHERE TRACKING_NO='".$trackingNo."'";
    $qry=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($qry);

    if($row > 0)
    {
        $found = true;
    }
    return $found;
}

$trackingNo=$_POST['TRACKING_NO'];
$receiverName=$_POST['RECEIVER_NAME'];
$receiverPhoNo=$_POST['RECEIVER_PHONO'];
$arrived_date=$_POST['ARRIVED_DATE'];
$arrived_time=$_POST['ARRIVED_TIME'];
$pic_arrived=$_POST['PIC_ARRIVED'];
$statusID=$_POST['STATUS_ID'];
$receiverID=$_POST['RECEIVER_ID'];
$courierID=$_POST['COURIER_ID'];
$employeeID=$_SESSION['EMPLOYEE_ID'];
$paymentID=$_POST['PAYMENT_ID'];


$register="INSERT INTO PARCEL (TRACKING_NO, RECEIVER_NAME, RECEIVER_PHONO, ARRIVED_DATE, ARRIVED_TIME, PIC_ARRIVED,  COLLECT_DATE, COLLECT_TIME, PIC_COLLECT,
STATUS_ID, RECEIVER_ID, COURIER_ID, EMPLOYEE_ID, PAYMENT_ID) VALUES('$trackingNo','$receiverName','$receiverPhoNo','$arrived_date', '$arrived_time', '$pic_arrived', null, null, null, '$statusID', '$receiverID', '$courierID', '$employeeID', '$paymentID')" or die("error".mysqli_errno($conn));

 if($conn->query($register)== true){?>

            
           <script type="text/javascript">
            alert("Succesfully add data");
            window.location.href = "register.php";
            </script><?php         
    }else{?>

       <script type="text/javascript">
            alert("Oops data already existed");
            window.location.href = "register.php";
            </script><?php
    }
    
    $conn->close();

?>