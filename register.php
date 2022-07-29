<!DOCTYPE html>
<?php
include 'connection.php';
session_start();
if(!isset($_SESSION['EMPLOYEE_ID'])){
	header('localhost:index.php');
	}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>UiTM SPARK SYSTEM | REGISTRATION</title>
  <link rel='shortcut icon' href='dist/img/logo JPK.png' type='image/x-icon'/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
            <h1>Parcel Registration</h1>
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
              <form id="register" name="register" method="post" action="register_process.php">
                <div class="card-body">
                <div class="form-group">
                    <label for="TRACKING_NO">Tracking Number</label>
                    <input type="text" class="form-control" name="TRACKING_NO" placeholder="Enter parcel tracking number">
                  </div>
                  <div class="form-group">
                    <label for="RECEIVER_NAME">Receiver Name</label>
                    <input type="name" class="form-control" name="RECEIVER_NAME" placeholder="Enter receiver name">
                  </div>
                  <div class="form-group">
                    <label for="RECEIVER_PHONO">Receiver Phone Number</label>
                    <input type="text" class="form-control" name="RECEIVER_PHONO" placeholder="Enter receiver phone number" onkeypress="return onlyNumberKey(event)" maxlength="11">
                  </div>
                  <div class="form-group">
                    <label for="ARRIVED_DATE">Arrived Date</label>
                    <input type="date" class="form-control" name="ARRIVED_DATE" placeholder="Enter inbound date">
                  </div>
                  <div class="form-group">
                    <label for="ARRIVED_TIME">Arrived Time</label>
                    <input type="time" class="form-control" name="ARRIVED_TIME" placeholder="Enter inbound date">
                  </div>
                  <div class="form-group">
                    <label for="PIC_ARRIVED">Person In Charged(arrived)</label>
                    <input type="text" class="form-control" name="PIC_ARRIVED" value="<?PHP echo $_SESSION['EMPLOYEE_NAME']; ?>" readonly="true"> 
                  </div>

                  <div class="form-group">
                  <label for="STATUS_ID"><b>Parcel Status</b></label>
	                <br>
	                <select name="STATUS_ID" class="form-control">
                  <option>PLEASE SELECT</option>
		              <option value="2001">ARRIVED</option>
		              <option value="2002">PENDING</option>
                  <option value="2003">COLLECTED</option>
	                </select>
                  </div>

                  <div class="form-group">
                  <label for="RECEIVER_ID"><b>Receiver Category</b></label>
	                <br>
	                <select name="RECEIVER_ID" class="form-control">
                  <option>PLEASE SELECT</option>
		              <option value="4001">STUDENT</option>
		              <option value="4002">STAFF</option>
	                </select>
                  </div>

                  <div class="form-group">
                  <label for="COURIER_ID"><b>Parcel Courier</b></label>
	                <br>
	                <select name="COURIER_ID" class="form-control">
                  <option>PLEASE SELECT</option>
		              <option value="3001">POS LAJU</option>
		              <option value="3002">J&T EXPRESS</option>
                  <option value="3003">SHOPPEE EXPRESS</option>
                  <option value="3004">PGEON</option>
                  <option value="3005">GDEX</option>
                  <option value="3006">DHL</option>
                  <option value="3007">PARCEL HUB</option>
                  <option value="3008">NINJA VAN</option>
                  <option value="3009">CITY-LINK EXPRESS</option>
                  <option value="3010">OTHERS</option>
	                </select>
                  </div>
                 
                  <div class="form-group">
                  <label for="PAYMENT_ID"><b>Payment Price</b>	  </label>
	                <br>
	                <select name="PAYMENT_ID" class="form-control">
                  <option>PLEASE SELECT</option>
		              <option value="1001">RM 1</option>
		              <option value="1002">RM 2</option>
                  <option value="1003">RM 3</option>
	                </select>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-success" style="width:100px;position:relative; left:900px;">Submit</button>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
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