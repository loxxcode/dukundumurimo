<?php
    include_once "./auth/connection.php";

  if (!isset($_GET['id'])) {
    header("location: ./index.php");
  }
  $id = $_GET['id'];

  $sql = mysqli_query($conn,"SELECT * FROM foods WHERE fdid = '{$id}'");
  if ($sql == true) {
    $fetch = mysqli_fetch_assoc($sql);
    $form = '<fieldset>
                <form action="" method="POST">
                        <label for="fdname">Product Name</label>
                        <input type="text" name="fdname" value = "'.$fetch['fdname'].'" disabled>
                        <label for="fdowner">Product Owner</label>
                        <input type="text" name="fdowner" value = "'.$fetch['fdowner'].'" disabled>
                        <label for="quantity">quantity</label>
                        <input type="number" name="quantity">
                        <label for="date">date</label>
                        <input type="date" name="date">
                    <input type="submit" name="submit" value="Import" class="submit">
                </form>
            </fieldset>';
  }
  if (isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    $check = mysqli_query($conn,"SELECT * FROM import WHERE fdid = '{$id}' ");
    if (mysqli_num_rows($check) > 0) {
        $fetch = mysqli_fetch_assoc($check);
        $new_quantity = $fetch['quantity'] + $quantity;
        $new_date = $date;

        $query = mysqli_query($conn,"UPDATE import SET quantity= '{$new_quantity}',importdate ='{$new_date}' WHERE fdid = '{$id}' ");
        if ($sql == true) {
            // echo "Products updated!<br> <a href='./viewimport.php'>View Imports</a>";
            echo "<h1>Record updated! </h1><label class='message'> Click on Import to see your record updated!</label>";

        }else {
            echo  "not updated";
        }

    }else {
        $sql = mysqli_query($conn,"INSERT INTO import(fdid,quantity,`importdate`) 
                                    VALUE ('{$id}','$quantity','$new_date') ");
    
        if ($sql == true) {
            // echo "Products inserted <a href='./viewimport.php'>View Imports</a>";
            echo "<h1>Record imported! </h1><label class='message'> Click on Import to see your record imported!</label>";

        }else {
            echo  "not inserted";
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Product | Page</title>
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
        <h2>Import product :</h2>
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