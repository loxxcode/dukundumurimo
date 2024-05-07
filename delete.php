<?php
    include "./auth/connection.php";

    if (!isset($_GET['id'])) {
        header("location: ./index.php");
    }
    if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM export WHERE fdid='{$id}'";
    $query=mysqli_query($conn,$sql);
        if($query == true){
            $sql1="DELETE FROM import WHERE fdid='{$id}'";
            $check = mysqli_query($conn,$sql1);

            if ($check == true) {
                $sql2="DELETE FROM foods WHERE fdid='{$id}'";
                $check1 = mysqli_query($conn,$sql2);
                if ($check1) {
                    header("location: ./index.php");
            }
        }
        
    }
     else{
        $sql3="DELETE FROM import WHERE fdid='{$id}'";
        $check2 = mysqli_query($conn,$sql3);

        if ($check2 == true) {
            $sql4="DELETE FROM foods WHERE fdid='{$id}'";
            $check3 = mysqli_query($conn,$sql4);
            if ($check3) {
                header("location: ./index.php");
            }
        }
        else {
            $sql5="DELETE FROM foods WHERE fdid='{$id}'";
            $check = mysqli_query($conn,$sql5);
            if ($check1) {
                header("location: ./index.php");
            }
        }
        
     }
}
?>