<?php
//database connection file
//save this file as connection.php inside the newly created folder
//declare variable
$dbuser = "root";
$dbpass = "";
$dbhost = "localhost";
$dbname = "sparkdb"; //string/char/varchar/text/lobclob/blob/date/time

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

/*if(!isset($conn))
    echo "connection is not ok";
else
    print "hahaha connection is ok";*/
?>