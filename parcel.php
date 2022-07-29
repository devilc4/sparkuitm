<!DOCTYPE html>
<?php
include 'connection.php';
session_start();
if(isset($_SESSION['EMPLOYEE_ID'])){
	header('localhost:homepage.php');
	}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> UiTM SPARK SYSTEM | COLLECTED </title>
  <link rel='shortcut icon' href='dist/img/logo JPK.png' type='image/x-icon'/>

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
   <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

  <link rel="stylesheet" href="dist/css/arrived.css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
          <div class="col-sm-9">
            <h1 class="m-0">PARCEL LIST</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
   <!-- Main content -->
      <section class="content">
        <div class="container-md">
          <div class="row">
            <div class="col-12">
                <!-- /.card-header -->
              <div class="card">
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size: 13px; margin-left:-10px;">
                    <thead>
                    <tr>
                    <th>NO.</th>
                    <th>TRACKING NO</th>
                    <th>RECEIVER NAME</th>
                    <th>RECEIVER PHONE NUMBER</th>
                    <th>RECEIVER CATEGORY</th>
                    <th>ARRIVED DATE</th>
                    <th>ARRIVED TIME </th>
                    <th>COURIER</th>
                    <th>PARCEL STATUS</th>
                    <th>PAYMENT</th>
                    </tr>
                    </thead>

                    <?php
                      include('connection.php');
                  
                      $query="SELECT * FROM PARCEL";
                      $result=mysqli_query($conn, $query);

                      
                      
                      if($result->num_rows > 0){
                          $i=1;
                          while ($row=mysqli_fetch_array($result)){
                          
                            $courier_id=$row['COURIER_ID'];
                            $status_id=$row['STATUS_ID'];
                            $payment_id=$row['PAYMENT_ID'];
                            $receiver_id=$row['RECEIVER_ID'];
                    
                                          $query1="SELECT c.COURIER_NAME, ps.STATUS_NAME, py.PAYMENT_PRICE, r.RECEIVER_DETAIL
                                                  FROM COURIER c, PARCEL_STATUS ps, PAYMENT py, RECEIVER_CATEGORY r
                                                  WHERE c.COURIER_ID=$courier_id and ps.STATUS_ID= $status_id and py.PAYMENT_ID=$payment_id and r.RECEIVER_ID= $receiver_id";
                                          $result1=mysqli_query($conn, $query1);
                                          $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
                              
                            
  
                            ?>
                             <tr>
                              <td><?php echo $i;?></td>
                              <td><?php echo $row['TRACKING_NO'];?></td>
                              <td><?php echo $row['RECEIVER_NAME'];?></td>
                              <td><?php echo $row['RECEIVER_PHONO'];?></td>
                              <td><?php echo $row1['RECEIVER_DETAIL'];?></td>
                              <td><?php echo $row['ARRIVED_DATE'];?></td>
                              <td><?php echo $row['ARRIVED_TIME'];?></td>
                              <td><?php echo $row1['COURIER_NAME'];?></td>
                              <td><?php echo $row1['STATUS_NAME'];?></td>
                              <td>RM <?php echo $row1['PAYMENT_PRICE'];?></td>
                              
                      </tr>
                            
                          <?php
                            $i++;}
                          }
                      else
                          {?>

                                            <td colspan=10><?php echo "<center>No records</center>";?></td>
                                            <?php
                                        }

                            ?>
                  </table>
                </div>

              </div>
                <!-- /.card-body -->
            </div>
              <!-- /.card -->
          </div>
            <!-- /.col -->
        </div>
          <!-- /.section -->
      </section>
      <!-- /.content -->
</div>
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


<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["pdf", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>