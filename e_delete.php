<?php

include_once "./auth/connection.php";

if (!isset($_GET['id'])) {
    header("location: ./viewexport.php");
}
$id =$_GET['id'];
$sql= mysqli_query($conn,"DELETE FROM export WHERE exportid = '{$id}'");

if ($sql == true) {
    header("location: ./viewexport.php");
}
else {
    echo "not deleted";
}


?>
