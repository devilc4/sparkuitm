<?php
session_start();
require('connection.php');

function checkEmpID($conn,$employeeID)
{
    $found = false;
    $sql = "SELECT EMPLOYEE_ID FROM EMPLOYEE WHERE EMPLOYEE_ID='".$employeeID."'";
    $qry=mysqli_query($conn,$sql);
    $row=mysqli_num_rows($qry);

    if($row > 0)
    {
        $found = true;
    }
    return $found;
}

$employeeID=$_POST['EMPLOYEE_ID'];
$employeeICNO=$_POST['EMPLOYEE_ICNO'];
$employeeName=$_POST['EMPLOYEE_NAME'];
$permission=$_POST['PERMISSION_ID'];



$register="INSERT INTO EMPLOYEE (EMPLOYEE_ID,EMPLOYEE_ICNO,EMPLOYEE_NAME,PERMISSION_ID) VALUES('$employeeID','$employeeICNO','$employeeName','$permission')" or die("error".mysqli_errno($conn));

 if($conn->query($register)== true){?>

           <script type="text/javascript">
            alert("Succesfully add data");
            window.location.href = "register_user.php";
            </script><?php         
    }else{?>

       <script type="text/javascript">
            alert("Oops data already existed");
            window.location.href = "register_user.php";
            </script><?php
    }
    
    $conn->close();

?>