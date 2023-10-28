<?php 

$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "waiecomlarav_db";

//Create MySQLI object
$mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);

if($mysqli -> connect_error){
    printf("Connect failed; #s/n", $mysqli -> connect_error);
    exit();

} else {
    echo "Good! <br>";
}
?>