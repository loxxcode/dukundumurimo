<?php

    include_once "./auth/connection.php";

    if (!isset($_GET['id'])) {
        header("location: ./viewexport.php");
    }
    $id = $_GET['id'];
    $sql= mysqli_query($conn,"SELECT * FROM export INNER JOIN foods ON export.fdid = foods.fdid WHERE exportid = '{$id}' ");
    $form = '';

    if ($sql == true) {
        $fetch = mysqli_fetch_assoc($sql);
        $form .= '<fieldset>
                        <legend>Update product</legend>
                        <form action="" method="POST">
                            <div class="" >
                                <label for="fdname">Product Name</label>
                                <input type="text" name="fdname" value = "'.$fetch['fdname'].'" disabled>
                            </div>
                            <div class="">
                                <label for="fdowner">Product Owner</label>
                                <input type="text" name="fdowner" value = "'.$fetch['fdowner'].'" disabled>
                            </div>
                            <div class="">
                                <label for="quantity">quantity</label>
                                <input type="text" name="quantity" value = "'.$fetch['quantity'].'">
                            </div>
                            <div class="">
                                <label for="date">date</label>
                                <input type="date" name="date" value = "'.$fetch['exportdate'].'">
                            </div>
                            <input type="submit" name="submit" value="Update product" class="submit">
                        </form>
                    </fieldset>';
    }

    if (isset($_POST['submit'])) {
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];

        $sql= mysqli_query($conn,"UPDATE export SET quantity='{$quantity}',`exportdate`='{$date}' WHERE exportid = '{$id}' ");
        if ($sql) {
            header("location: ./viewexport.php");
        }
        else {
            echo "not updated";
        }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product | Page</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/i_update.css">
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