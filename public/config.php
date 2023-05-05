<?php
define('DB_SERVER', 'mysql');
define('DB_USERNAME', 'juliana');
define('DB_PASSWORD', 'admin');
define('DB_NAME', 'mydb');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?>
