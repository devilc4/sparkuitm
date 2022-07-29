<!DOCTYPE html> 

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
            <i class="material-icons lock">lock</i>UiTM SPARK SYSTEM</div>

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

        <footer class="main-footer" style="margin-top:130px;" >
            <strong>Copyright &copy; 2022. JAWATANKUASA PERWAKILAN KOLEJ KAMPUS RAUB</strong>
        </footer>   
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