<?php
  session_start();
     $conn = mysqli_connect("localhost","root","","dukundumurimo");
     if (!$conn) {
         echo "Not connected";
     }
     if (isset($_SESSION['managerid'])) {
         header("location: ../index.php");
     }

     if (isset($_POST['submit'])) {
        $mname = $_POST['mname'];
        $pass = $_POST['pass'];

        $check = mysqli_query($conn, "SELECT * FROM manager WHERE mname = '{$mname}' AND pass = '{$pass}'");
        if (mysqli_num_rows($check) > 0) {
            $fetch = mysqli_fetch_assoc($check)['managerid'];
            $_SESSION['managerid'] = $fetch; 
            header("location: ../index.php");
        }else{
            echo "Username or password is incorrect!";
        }
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN | Page</title>
    <link rel="stylesheet" type="text/css" href="../style/login.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
</head>
<body>
    <header>
        <img src="../img/logo.png" alt="">
        
        </header>
    </header>
    <aside>
        <h1>DUKUNDUMURIMO COMPANY LIMITED</h1>
        <h2>Export and import goods</h2>
        <p>Dukundumurimo identifies products that are in demand internationally <br>
         and are produced within their country.To effectively engage in export and <br>
         import activities, Dukundumurimo conducts thorough market research and analysis. <br>
         Managing the logistics and supply chain is crucial for the success of an export-import business. <br>
         International trade involves inherent risks, such as currency fluctuations, geopolitical instability, <br>
         transportation delays, and trade barriers. Dukundumurimo employs risk management <br>
         strategies to mitigate these risks, such as hedging against currency fluctuations, diversifying their <br>
         supplier and customer base,and staying informed about geopolitical developments that could impact trade.
        </p>
    </aside>
    <fieldset>
        <legend> Admin Information </legend>
        <form method="POST" action="">
            
            Username<input type="text" name="mname" required ><br>
            
            Password<input type="password" name="pass" required><br><br>

            <input name="submit" type="submit" value="login" class="submit"><br>
            Don't have account?<a href="signup.php">Sign up</a>
        </form>
    </fieldset><br><br>
    <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="../img/logo.png" alt="Dukundumurimo Company Limited">
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