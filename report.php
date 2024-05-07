<?php 


include_once "./Auth/connection.php";
$tbody = '';
$num_rows = '';
$sql = mysqli_query($conn, "SELECT *, import.quantity AS imp_quantity,
                                      export.quantity AS exp_quantity
                                    FROM foods
                                    INNER JOIN import ON foods.fdid = import.fdid
                                    INNER JOIN export ON foods.fdid = export.fdid
                                    " );


if($sql == true){
    $num_rows = mysqli_num_rows($sql);
    if($num_rows > 0){
        $a = 0;

        while($fetch = mysqli_fetch_assoc($sql)){
            $a++;
            $tbody .= '<tr>
                        <td>'.$a.'</td>
                        <td>'.$fetch['fdname'].'</td>
                        <td>'.$fetch['fdowner'].'</td>
                        <td>'.$fetch['imp_quantity'].'</td>
                        <td>'.$fetch['exp_quantity'].'</td>
                        <td>'.$fetch['importdate'].'</td>
                        <td>'.$fetch['exportdate'].'</td>
                    </tr>';
        }


    }else{
        $tbody .= '<tr> <td> Not Record Found! </td> </tr>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report | Page</title>
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
        <!-- <h2>Report of Imported And Exported Products:</h2> -->
        <h1>STORE REPORT</h1>
        <button onclick="print()">PRINT</button>
        <table border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product name</th>
                    <th>Product owner</th>
                    <th>Import Quantity</th>
                    <th>Export Quantity</th>
                    <th>Import Date</th>
                    <th>Export Date</th>
                    
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

<style>
    aside button{
        margin-bottom: 10px;
        margin-left: 63%;
    }
</style>