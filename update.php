<?php
    include_once "./auth/connection.php";
    
    if (!isset($_GET['id'])) {
        header("location: ./index.php");
      }
    $id = $_GET['id'];
    $sql = mysqli_query($conn,"SELECT * FROM foods WHERE fdid = '{$id}' ");
    $form = '';

    if ($sql == true) {
        $fetch = mysqli_fetch_assoc($sql);
        $form = '<fieldset>
                        <legend>Update Products</legend>
                    <form action="" method="POST">
                            <label for="fdname">Product Name</label>
                            <input type="text" name="fdname" value = "'.$fetch['fdname'].'">
                            <label for="fdowner">Product Owner</label>
                            <input type="text" name="fdowner" value = "'.$fetch['fdowner'].'">
                            <label for="tel">Mobile Number</label>
                            <input type="text" name="tel" value = "'.$fetch['tel'].'">
                        <input type="submit" name="submit" value="add product" class="submit">
                    </form>
                </fieldset>';
    }else {
        echo "Not selected";
    }
    if (isset($_POST['submit'])) {
        $fdname = $_POST['fdname'];
        $fdowner = $_POST['fdowner'];
        $tel = $_POST['tel'];

        $sql = mysqli_query($conn,"UPDATE foods SET fdname = '{$fdname}',fdowner = '{$fdowner}',tel = '{$tel}' WHERE fdid = '{$id}'");
        if ($sql = true) {
            // echo "<h1>Record updated! </h1><label class='message'> Click on Home to see your record updated!</label>";
            header("location: ./index.php");
        }
        else {
            echo "record not inserted";
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
    <link rel="stylesheet" type="text/css" href="./style/update.css">
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
    <?php echo $form; ?>
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