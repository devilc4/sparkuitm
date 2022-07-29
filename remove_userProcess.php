<?php
	include 'connection.php';
	if (isset($_GET['employee_id']))
            $employee_id = $_GET['employee_id'];
        else
            $employee_id = 0;
	
     $sql1="SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID='$employee_id'";
     $result1=mysqli_query($conn, $sql1);
     $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

    
	if($conn->query($sql1)==true) {
		$sql2="UPDATE EMPLOYEE SET PERMISSION_ID= '2' WHERE EMPLOYEE_ID='$employee_id'";
		if($conn->query($sql2) == true)
		{?>
			<script type="text/javascript">
			alert("Succesfully deleted data");
			window.location.href = "update_user.php";


			</script>
		<?php
		}
		
	}else{?>
		<script type="text/javascript">
			alert("Oops something error");
			window.location.href = "remove_user.php";
			</script><?php
	}
	$conn->close();
?>