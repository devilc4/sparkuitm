<!DOCTYPE html>
<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['EMPLOYEE_ID'])){
	header('localhost:index.php');
	}

    function getid()
    {
        echo $_SESSION['TRACKING_NO'];
    }


    if(isset($_POST['update'])){

      $tracking_no = ($_POST['TRACKING_NO']);
      $collect_date = ($_POST['COLLECT_DATE']);
      $collect_time = ($_POST['COLLECT_TIME']);
      $pic_collect = ($_POST['PIC_COLLECT']);

    
      $insert = "UPDATE PARCEL set COLLECT_DATE = '$collect_date', COLLECT_TIME = '$collect_time', PIC_COLLECT = '$pic_collect', STATUS_ID = 2003 WHERE TRACKING_NO= '$tracking_no'";
     
      if($conn->query($insert)== TRUE){?>
  
        <script type="text/javascript">
            alert("Succesfully add data");
            window.location.href = "claim.php";
            </script><?php         
      }
      else{?>

       <script type="text/javascript">
            alert("Oops data already existed");
            window.location.href = "claim.php";
            </script><?php
    }
    }
      
      $conn->close();
  

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> UiTM SPARK SYSTEM | CLAIM </title>
  <link rel='shortcut icon' href='dist/img/logo JPK.ico' type='image/x-icon'/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> <!--new-->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href= "homepage.php" class= "nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href= "https://pahang.uitm.edu.my/index.php/en/directory/raub-directory" class= "nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
          </a>
          <div class="dropdown-divider"></div>
          <a href="index.php" class="dropdown-item dropdown-footer">Logout</a>
        </div>
      </li>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/logo JPK.png" alt="JPK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SPARK SYSTEM</span>
    </a>

     <!-- Sidebar -->
     <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user.ico" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php if(($_SESSION['EMPLOYEE_ID']) == 2020877832) 
                                            {
                                              echo "HELLO MANAGER!"; 
                                            }
                                            else 
                                            {echo "HELLO MEMBER!"; }?></a>                                 
          <a href="#" class="d-block"><?php if(isset($_SESSION['EMPLOYEE_NAME'])) { echo $_SESSION['EMPLOYEE_NAME']; } ?> </a>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav>
          <?php include('side.php'); ?>
        </ul>
      </nav>

    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parcel Claim</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary" style="width: 66rem;">
              <div class="card-header">
                <h3 class="card-title"><strong>Please enter the information</strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="register" name="claim" method="POST" action="">
                <div class="card-body">
                  <div class="form-group">
                    <label for="TRACKING_NO">Tracking Number</label>
                    <input type="text" class="form-control" id="TRACKING_NO" name="TRACKING_NO" placeholder="Enter parcel tracking number" onkeyup="GetDetail(this.value)" value="">
                  </div>

                  <div class="form-group">
                    <label for="RECEIVER_NAME">Claimer Name</label>
                    <input type="text" class="form-control" id="RECEIVER_NAME" name="RECEIVER_NAME" value="" readonly="true">
                  </div>

                  <div class="form-group">
                    <label for="ARRIVED_DATE">Claimed Date</label>
                    <input type="date" class="form-control" id="COLLECT_DATE" name="COLLECT_DATE" placeholder="Enter inbound date">
                  </div>
                  <div class="form-group">
                    <label for="ARRIVED_TIME">Claimed Time</label>
                    <input type="time" class="form-control" id="COLLECT_TIME" name="COLLECT_TIME" placeholder="Enter inbound date">
                  </div>

                  <div class="form-group">
                    <label for="PIC_CLAIMED">Person In Charged(claimed)</label>
                    <input type="text" class="form-control" id="PIC_COLLECT" name="PIC_COLLECT" value="<?PHP echo $_SESSION['EMPLOYEE_NAME']; ?>" readonly="true"> 
                  </div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="SUBMIT" class="btn btn-success" style="width:100px;position:relative; left:900px" name="update" id="btnnav" value="Update">
                  
                
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <footer class="main-footer">
    <strong>Copyright &copy; 2022. JAWATANKUASA PERWAKILAN KOLEJ KAMPUS RAUB</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>SPARK</b> 2022 V.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!--<script src="plugins/chart.js/Chart.min.js"></script>-->
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script>

  
// onkeyup event will occur when the user 
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
    if (str.length == 0) {
        document.getElementById("RECEIVER_NAME").value = "";
    }
    else {

        // Creates a new XMLHttpRequest object
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {

            // Defines a function to be called when
            // the readyState property changes
            if (this.readyState == 4 && 
                    this.status == 200) {
                  
                // Typical action to be performed
                // when the document is ready
                var myObj = JSON.parse(this.responseText);

                // Returns the response data as a
                // string and store this array in
                // a variable assign the value 
                // received to first name input field
                  
                document.getElementById
                    ("RECEIVER_NAME").value = myObj[0];
                
            }
        };

        // xhttp.open("GET", "filename", true);
        xmlhttp.open("GET", "claim_process.php?TRACKING_NO=" + str, true);
          
        // Sends the request to the server
        xmlhttp.send();
    }
}
</script>



</body>
</html>
