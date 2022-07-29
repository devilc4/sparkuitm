<!DOCTYPE html> 
<?php
session_start();
include('connection.php');
?>

<html>
    <head>
        <meta name="viewport" content="width=device-width, initial scale=1.0">
        <meta charset="utf-8">
        <link href="dist/css/index.css" rel="stylesheet">
        <title>UiTM SPARK SYSTEM | LOGIN</title>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel='shortcut icon' href='dist/img/login.ico' type='image/x-icon'/>
    </head>

    <body >
    <div class="topnav">
        <li class="sidemenubtn">
        <span style="font-size:30px;cursor:pointer;" onclick="openNav();">&#9776;</span>
        <a style= "padding:30px;" href="cust_trackntrace.php">Track & Trace</a>
        <a href="aboutus.php">About Us</a>
        </li>
    </div>
    
    <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&#60;</a>
            <a href="https://simsweb.uitm.edu.my/SPORTAL_APP/SPORTAL_LOGIN/index_login.htm">iStudent Portal</a>
            <a href="https://ufuture.uitm.edu.my/login">UFUTURE</a>
            <a href="https://hea.uitm.edu.my/v4/index.php/calendars/academic-calendar">Academic Calendar</a>
            <a href="cust_trackntrace.php">Track & Trace</a>
            <a href="aboutus.php">About Us</a>
    </div>
                   
    <div id="container-login">
        <div id="title">
            <i class="material-icons lock">lock</i> UiTM SPARK SYSTEM</div>

    <form action="plogin.php" class="form" id="login" method="POST">    
        <div class="input">
            <div class="input-addon">
               <i class="material-icons">face</i></div>
               <input type="text" id="EMPLOYEE_ID" name="EMPLOYEE_ID" class="form__input" placeholder="User ID" required> 
        </div>

        <div class="input">
            <div class="input-addon">
                <i class="material-icons">vpn_key</i></div>
                <input type="password" id="password" name="password" class="form__input form__input--error" placeholder="Password" required> 
            </div>
            <input type="submit" name="login" value="Login">

    </form>

            <div class="forgot-password">
                <a href="https://sims-recover.uitm.edu.my/recover/pwd/index.htm">Forgot your password?</a>
            </div>

    </div>

        <footer class="main-footer" style="margin-top:132px;" >
            <strong>Copyright &copy; 2022. JAWATANKUASA PERWAKILAN KOLEJ KAMPUS RAUB</strong>
        </footer> 
        
        <?php
        $employeeID = mysqli_real_escape_string($conn,$_POST['EMPLOYEE_ID']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);
        
        $sql = "SELECT * FROM EMPLOYEE WHERE EMPLOYEE_ID = '$employeeID' AND EMPLOYEE_ICNO = '$password' AND PERMISSION_ID = '1'";
        $qry = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($qry);

        if($row >0 )
        {
            $r = mysqli_fetch_assoc($qry);
            session_start();
            $_SESSION['EMPLOYEE_ID'] = $employeeID;
            $_SESSION['EMPLOYEE_NAME'] = $r['EMPLOYEE_NAME'];
            
            header("Location: homepage.php");
        }

        else{?>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script type="text/javascript">
                Swal.fire({
                icon: 'error',
                title: 'Something went wrong!',
                text: 'INVALID USERNAME AND PASSWORD !',
                footer: '<a href="index.php">Click here to retry</a>'
                });
            </script><?php
            }

            mysqli_close($conn);
        ?>

</body>
    <script>
        function openNav() {
                document.getElementById("mySidenav").style.width = "200px";
                        }
        function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
            }
    </script>
</html>
