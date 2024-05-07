<?php

include_once "./auth/connection.php";

if (!isset($_GET['id'])) {
    header("location: ./viewimport.php");
}
$id =$_GET['id'];
$sql= mysqli_query($conn,"DELETE FROM import WHERE importid = '{$id}'");

if ($sql == true) {
    header("location: ./viewimport.php");
}
else {
    echo "not deleted";
}


?>
