<?php 

include_once "./Auth/connection.php";


if(!isset($_GET['id'])){
    header("Location: ./viewimport.php");
}

$id = $_GET['id'];
$sql = mysqli_query($conn, " SELECT * FROM import INNER JOIN foods ON import.fdid = foods.fdid WHERE import.fdid = '{$id}'" );

if($sql == true){
    $fetch = mysqli_fetch_assoc($sql);

    $form = '<fieldset>
                <form action="" method="POST">
                        <label for="fdname">Product Name</label>
                        <input type="text" name="fdname" value = "'.$fetch['fdname'].'" disabled>
                        <label for="fdowner">Product Owner</label>
                        <input type="text" name="fdowner" value = "'.$fetch['fdowner'].'" disabled>
                        <label for="quantity">quantity</label>
                        <input type="number" name="quantity" value = "'.$fetch['quantity'].'">
                        <label for="date">date</label>
                        <input type="date" name="date" value = "'.$fetch['importdate'].'">
                    <input type="submit" name="submit" value="Export" class="submit">
                </form>
            </fieldset>';



if(isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $check = mysqli_query($conn, " SELECT * FROM export WHERE fdid = '{$id}' " );
    if(mysqli_num_rows($check) > 0){
        $fetch = mysqli_fetch_assoc($check);
        $new_quantity = $fetch['quantity'] + $quantity;
        

        $sql = mysqli_query($conn, " UPDATE export SET quantity='{$new_quantity}', `exportdate` = '{$date}' WHERE fdid = '{$id}' " );
        if($sql == true){
            $sql = mysqli_query($conn, "SELECT * FROM import WHERE fdid = '{$id}' ");
            $fetch = mysqli_fetch_assoc($sql);

            $new_imp_quantity = $fetch['quantity'] - $quantity;

            $sql = mysqli_query($conn, " UPDATE import SET quantity='{$new_imp_quantity}', `importdate` = '{$date}' WHERE fdid = '{$id}' " );
            if($sql == true){
                // echo "Record Exported! <a href='./viewexport.php'>View Exports</a> ";
                header("location: ./viewexport.php");
            }
        }
    }else{

        $sql = mysqli_query($conn, "INSERT INTO export(fdid, quantity,exportdate) VALUES('{$id}', '{$quantity}','{$date}') " );
        if($sql == true){
            $sql = mysqli_query($conn, "SELECT * FROM import WHERE fdid = '{$id}' ");
            $fetch = mysqli_fetch_assoc($sql);

            $new_imp_quantity = $fetch['quantity'] - $quantity;

            $sql = mysqli_query($conn, " UPDATE import SET quantity='{$new_imp_quantity}', `importdate` = '{$date}' WHERE fdid = '{$id}' " );
            if($sql == true){
                // echo "Record Exported! <a href='./viewexport.php'>View Exports</a> ";
                header("location: ./viewexport.php");
            }
            
        }

    }

}



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export product | Page</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/import.css">
</head>
<body>
        <header>
            <img src="./img/logo.png" alt="">
            <div class="links">
                <a href="./index.php">Home</a>
                <a href="food.php">Add product</a>
                <a href="./viewimport.php">Import</a>
                <a href="./viewexport.php">Export</a>
                <a href="./report.php">Report</a>
                <a href="./auth/logout.php" class="log">Logout</a>
            </div>
        </header>
    <aside>
        <h2>Export product :</h2>
        <?php echo $form;  ?>
    </aside><br><br>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="./img/logo.png" alt="Dukundumurimo Company Limited">
        </div>
        <div class="footer-info">
                <p>Dukundumurimo Company Limited</p>
                <p>Location: Muhanga District</p>
                <p>Phone: 0798967447</p>
                <p>Email: dukundumurimo@gmail.com</p>
            </div>
        </div>
        <div class="footer-social">
            <ul>
                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
            </ul>
        </div>
            <p>&copy; 2024 Dukundumurimo company limited. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>