
<!DOCTYPE html>
<html>
    <head>
        <title>UiTM SPARK SYSTEM | TRACKING</title>
        <link rel='shortcut icon' href='dist/img/logo JPK.png' type='image/x-icon'/>
        <link rel="stylesheet" href="dist/css/tnt.css">

<style>
    .searchtf input[type=varchar] {
    float:absolute;
    padding: 6px;
    border: 1px solid #ddd;
    border-radius: 3px;
    margin-top: 8px;
    width: 50%;
    margin-right: 16px;
    font-size: 17px;
}

.tfbutton {
    border: none;
    padding: 6px 20px;
    text-align: center;
    text-decoration: bold;
    font-family: Calibri;
    border-radius: 3px;
    font-size: 17px;
    margin: 4px 2px;
    -webkit-transition:background-color .5s;
    
}
table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    border-spacing: 0;
    width: 70%;
    margin: auto;
    border: 1px solid #ddd;
}
th, td {
    text-align: left;
    padding: 6px;
}

tr:nth-child(even){background-color: #f2f2f2}

 .bback {
    text-align: center;
    display: inline-block;
    font-family: Calibri;
    font-size: 14px;
    margin-left: 50%;
    cursor: pointer;
    border-radius: 8px;
    -webkit-transition:background-color .5s

}

    </style>
    <header>
            <div class="container">
                <div id="main">
                <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span></li>
                    <div id="brandig">
                   
                       <div id="mySidenav" class="sidenav">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                            <a href="index.php">Home</a>
                            <a href="aboutus.php">About Us</a>
                            <a href="cust_trackntrace.php">TRACK AND TRACE</a>
                        </div>
                       
                <h1><span class = "highlight">UiTM SPARK SYSTEM</span><span class = "highlight2">TRACKING</span></h1>
                    </div>
            </div>
        </header>

        <body>
        <BR><BR><BR>
            <div class = "container">
                <div class = "back">
        <div class="table">
            <table class="table table-bordered">
                <div style="align: center">
                <div style="overflow-x:auto;">
                <h1 style="align: center;">Enter your tracking number to track your parcel</h1>
                    <div class="searchtf">
                        <form action="cust_trackntrace.php" target="_self" method="post" > 
                            <center><input type = "varchar" placeholder="Tracking No"  name="trackingNo">
                            <input type="submit" class="tfbutton w3-hover-red btn-lg" name= "search" value="Search" style="background-color:#a18181"></i></center>
                          
                        </form>
                    </div>
                    

<?php
include ('connection.php');
mysqli_select_db($conn,'sparkdb');


if(!empty($_POST['trackingNo']))
{
    $s = mysqli_real_escape_string($conn, $_REQUEST['trackingNo']);

    $sql = "SELECT p.TRACKING_NO, p.RECEIVER_NAME, p.RECEIVER_PHONO, r.RECEIVER_DETAIL, c.COURIER_NAME, py.PAYMENT_PRICE, ps.STATUS_NAME
            FROM PARCEL p, RECEIVER_CATEGORY r, COURIER c, PAYMENT py, PARCEL_STATUS ps
            WHERE p.STATUS_ID=ps.STATUS_ID and r.RECEIVER_ID=p.RECEIVER_ID and c.COURIER_ID=p.COURIER_ID and py.PAYMENT_ID=p.PAYMENT_ID and p.TRACKING_NO LIKE '%".$s."%'";

    $sql2 = "SELECT * FROM PARCEL WHERE TRACKING_NO LIKE '%".$s."%'";

    $r_query = mysqli_query($conn, $sql);
    $r_query1 = mysqli_query($conn, $sql2);
    $row1 = mysqli_fetch_array($r_query1); 
    $row = mysqli_fetch_array($r_query, MYSQLI_ASSOC); 

    if($row > 0){
    echo "<br><h1>TRACKING INFORMATION</h1>"; ?>
    <div>
            <tr >
                <th style="background-color: #9e7c7c;" width="158" scope="row"><div>RECEIVER NAME </div></th>
                <td>&nbsp; <?php echo $row1['RECEIVER_NAME']; ?></td>
            </tr>
            <tr>
                <th  style="background-color: #9e7c7c;" scope="row"><div>RECEIVER PHONE NUMBER </div></th>
                <td style="background-color: #ccc;">&nbsp; <?php echo $row1['RECEIVER_PHONO']; ?></td>
            </tr>
            <tr>
                <th style="background-color: #9e7c7c;" width="158" scope="row"><div>RECEIVER CATEGORY </div></th>
                <td>&nbsp; <?php echo $row['RECEIVER_DETAIL']; ?></td>
            </tr>
            <tr >
                <th  style="background-color: #9e7c7c;" width="158" scope="row"><div>COURIER NAME</div></th>
                <td style="background-color: #ccc;">&nbsp;  <?php echo $row['COURIER_NAME']; ?></td>
            </tr>
        
                <div class="table">
                <table class="table table-bordered">
                <div style="text-align=center">
                <div style="overflow-x:auto;">

        
        <table style="border:2; cellpadding=2; cellspacing=2; width=50%; ">
        <tr>
                <th style="text-align:center;background-color: #9e7c7c;" width="130">Tracking Number</th>
                <th style="text-align:center;background-color: #9e7c7c;">Parcel Status</th>
                <th style="text-align:center;background-color: #9e7c7c;" width="100">Payment</>
            
        </tr>
        <tr><br>
        <br><br>
        <h1>HERE'S YOUR TRACKING NUMBER<br><?php echo $row['TRACKING_NO'];?></h1>
        <br>
                <td style="text-align:center;"><?php echo $row['TRACKING_NO'];?></td>
                <td style="text-align:center;background-color: #ccc;"><?php echo $row['STATUS_NAME'];?></td>
                <td style="text-align:center;">RM <?php echo $row['PAYMENT_PRICE'];?></td>
                
        </tr>
        <div style="text-align:center;">
        <b><?php echo 'arrived-   [registered in the system] ||' ; ?> <b>
        <b><?php echo 'collected- [claimed by receiver] ||' ; ?> <b>
        <b><?php echo ' pending-   [unclaimed within 5 days]' ; ?> <b> 
        </div><?php
    }
    else{?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript">
            Swal.fire(
            'INVALID',
            'TRACKING NUMBER !',
            'error'
            );
        
        </script><?php
        }
    
        mysqli_close($conn);
}?>

</div></table></div></div></div></div>


 <script>
 
        function openNav() {
                document.getElementById("mySidenav").style.width = "200px";
                document.getElementById("main").style.marginLeft = "200px";
            }
        function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft= "0";
            }
            </script>
        <footer class="main-footer"style="margin-top: 190px;">
            <strong>Copyright &copy; 2022. JAWATANKUASA PERWAKILAN KOLEJ KAMPUS RAUB</strong>
        </footer> 
</body>

</html>
