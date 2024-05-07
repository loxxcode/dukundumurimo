<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","","dukundumurimo");
    if (!$conn) {
        echo "Not connected";
    }
    if (!isset($_SESSION['managerid'])) {
        header("location: ./login.php");
    }
?>
