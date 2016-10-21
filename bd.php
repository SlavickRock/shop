<?php
$mysqli = new mysqli("","","","") ;
mysqli_set_charset($mysqli,'utf8');
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}
 ?>
