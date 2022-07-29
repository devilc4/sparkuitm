<!DOCTYPE html>
<?php
session_start();
require('connection.php');
if(!isset($_SESSION['EMPLOYEE_ID'])){
	header('location:index.php');
	}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> UiTM SPARK SYSTEM | USER </title>
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
            <h1>ADD NEW SPARK MEMBER</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">

            <!-- general form elements -->
            <div class="card card-success" style="width: 65rem; left:10px;">
              <div class="card-header">
                <h3 class="card-title"><strong>Add User</strong></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="register" name="register" method="post" action="register_userProcess.php">
                <div class="card-body">
                  <div class="form-group">
                    <label for="EMPLOYEE_ID">Employee ID</label>
                    <input type="text" class="form-control" name="EMPLOYEE_ID" id="EMPLOYEE_ID" placeholder="eg: 2020812345" onkeypress="return onlyNumberKey(event)" maxlength="10">
                  </div>

                  <div class="form-group">
                    <label for="EMPLOYEE_ICNO">Employee IC (without -)</label>
                    <input type="text" class="form-control" name="EMPLOYEE_ICNO" id="EMPLOYEE_ICNO" placeholder="eg: 020610042843" onkeypress="return onlyNumberKey(event)" maxlength="12">
                  </div>

                  <div class="form-group">
                    <label for="EMPLOYEE_NAME">Employee Name</label>
                    <input type="name" class="form-control" name="EMPLOYEE_NAME" id="EMPLOYEE_NAME" placeholder="Enter employee name">
                  </div>

                  <div class="form-group">
	                <label for="permission"><b>Access permission</b>	  </label>
	                <br>
	                <select name="PERMISSION_ID" class="form-control">
                  <option>PLEASE SELECT</option>
		              <option value="1">ACTIVE</option>
		              <option value="2">INACTIVE</option>
	                </select>
                </div>
                <!-- /.card-body -->
                <div>
                <button type="submit" class="btn btn-success" style="width:100px;position:relative; left:900px" onkeyup="checkEmpID()">Add</button>
                </div>
              </form>
            </div>
        </div>
         <!--REMOVE USER-->
            
                    </form>
                </div>
            </div>
            <!-- /.card -->
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
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</body>
</html>