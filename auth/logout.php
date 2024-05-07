<?php
    session_start();

    if (isset($_SESSION['managerid'])) {
        session_unset();
        session_destroy();
        header("location: ./login.php");
    }
    else {
        echo "not set";
    }
?>