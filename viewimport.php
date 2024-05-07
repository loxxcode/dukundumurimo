<?php
    include_once "./auth/connection.php";
    
    $sql = mysqli_query($conn,"SELECT * FROM import INNER JOIN foods ON import.fdid = foods.fdid ");
    $tbody = '';
    if ($sql == true) {
        $a = 0;
        $num_rows= mysqli_num_rows($sql);
        if ($num_rows >0) {
            while ($fetch = mysqli_fetch_assoc($sql)) {
            $a++;
            $tbody .=' <tr>
                        <th>'.$a.'</th>
                        <th>'.$fetch['fdname'].'</th>
                        <th>'.$fetch['fdowner'].'</th>
                        <th>'.$fetch['quantity'].'</th>
                        <th>'.$fetch['importdate'].'</th>
                        <td><a href="./i_update.php?id='.$fetch['importid'].'">update</a></td>
                        <td><a href="./i_delete.php?id='.$fetch['importid'].'">delete</a></td>
                        <td><a href="./export.php?id='.$fetch['fdid'].'">Export</a></td>
                        
                    </tr>';
            }
        }else {
            $tbody .= "<tr><td colspan='4'>no record</td></tr>";
        }
        
    }else {
        echo "not selected";
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import List | Page</title>
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="./style/dispimport.css">
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
        <h2>LIST OF PRODUCTS IMPORTED</h2>
        <button onclick="print()">PRINT</button>
        <table border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product name</th>
                    <th>Product owner</th>
                    <th>Quantity</th>
                    <th>Date</th>
                    <th colspan="3">Action</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php 
                    echo $tbody; 
                ?>
                <tr>
                    <td>Total:</td>
                    <td colspan="6"><?php echo $num_rows; ?></td>
                </tr>
            </tbody>
        </table>
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