<?php
  
// Database connection
$con = mysqli_connect("localhost", "root", "", "sparkdb");
// Get the user id 
$trackingNo = $_REQUEST['TRACKING_NO'];
  
  
if ($trackingNo !== "") {
      
    // Get corresponding first name and 
    // last name for that user id    
    $query = mysqli_query($con, "SELECT RECEIVER_NAME FROM PARCEL WHERE TRACKING_NO='$trackingNo'");
  
    $row = mysqli_fetch_array($query);
  
    // Get the name
    $receiverName = $row["RECEIVER_NAME"];
  
    
}
  
// Store it in a array
$result = array("$receiverName");
  
// Send in JSON encoded form
$myJSON = json_encode($result);
echo $myJSON;
?>


<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['TRACKING_NO'])){
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


  
/*
$trackingNo=$_POST['TRACKING_NO'];
$collect_date=$_POST['COLLECT_DATE'];
$collect_time=$_POST['COLLECT_TIME'];
$pic_collect=$_POST['PIC_COLLECT'];

$update="UPDATE PARCEL SET COLLECT_DATE='$collect_date', COLLECT_TIME='$collect_time', PIC_COLLECT='$pic_collect', STATUS_ID = '2003' WHERE TRACKING_NO='$trackingNo'";

if($conn->query($update)== true){?>

    <script type="text/javascript">
     alert("Succesfully add data");
     window.location.href = "claim_manager.php";
     </script><?php         
}else{?>

<script type="text/javascript">
     alert("Oops data already existed");
     window.location.href = "claim_manager.php";
     </script><?php
}

$conn->close();*/
?>
