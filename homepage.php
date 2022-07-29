<!DOCTYPE html>
<?php
//save as dashboard.php

session_start();
include('connection.php');

?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> UiTM SPARK SYSTEM | HOME </title>
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
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SPARK DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content" >
      <div class="container-fluid" style= "width:1300px;margin-right:100px;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
                    <div class="small-box bg-info" style="color: #000000" >
                      <div class="inner"  style="color: #000000">
                      <h3>
                        <?php
                        include('connection.php'); 
                        if(!isset($_SESSION['TRACKING_NO'])){
                          $query="SELECT TRACKING_NO FROM PARCEL WHERE STATUS_ID='2001'";
                          $result=mysqli_query($conn, $query);

                          if($result){
                            $row = mysqli_num_rows($result);
                            if($row){
                              printf($row);
                            }
                            else{
                              echo"0";
                            }
                            mysqli_free_result($result);
                          }
                      } mysqli_close($conn);?>
                      </h3>

                        <p>NEW ARRIVED</p>
                      </div>
                      <div class="icon">
                        <i class="ion-archive"></i>
                      </div>
                      <div class="small-box-footer">
                      <a href="arrived.php" style="color: #000000" >More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                  </div>

                  
          <!-- ./col -->
          <div class="col-lg-3 col-6" >
                  <!-- small box -->
                  <div class="small-box bg-success" >
                    <div class="inner" style="color: #000000">
                      <h3>
                        <?php
                        include('connection.php'); 
                        if(!isset($_SESSION['TRACKING_NO'])){
                          $query="SELECT TRACKING_NO FROM PARCEL WHERE STATUS_ID='2003'";
                          $result=mysqli_query($conn, $query);

                          if($result){
                            $row = mysqli_num_rows($result);
                            if($row){
                              printf($row);
                            }
                            else{
                              echo "0";
                            }
                            mysqli_free_result($result);
                          }
                      } mysqli_close($conn);?>
                      </h3>
                      

                      <p>COLLECTED</p>
                    </div>
                    <div class="icon">
                      <i class="ion-ios-box"></i>
                    </div>
                    <div class="small-box-footer">
                    <a href="collected.php"  style="color: #000000" >More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning" >
                  <div class="inner" >
                  <h3>
                        <?php
                        include('connection.php'); 
                        if(!isset($_SESSION['TRACKING_NO'])){
                          $query="SELECT TRACKING_NO FROM PARCEL WHERE STATUS_ID='2002'";
                          $result=mysqli_query($conn, $query);

                          if($result){
                            $row = mysqli_num_rows($result);
                            if($row){
                              printf($row);
                            }
                            else{
                              echo "0";
                            }
                            mysqli_free_result($result);
                          }
                      } mysqli_close($conn);?>
                      </h3>
                    
                    <p>PENDING</p>
                  </div>
                  <div class="icon">
                    <i class="ion-android-share"></i>
                  </div>
                  <a href="pending.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
 
   <!-- /.content -->

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
</body>
</html>