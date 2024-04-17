<?php
session_start();

include '../config.php';
$email = $_POST['email'];
$password = $_POST['password'];

// Fetch user from database
$sql = "SELECT * FROM user WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        if ($email === 'amenybouabdallah@gmail.com') {
            // Redirect admin to admin dashboard
            header("Location: admin_dashboard.php");
        } else {
            // Redirect clients to client dashboard
            header("Location: client_dashboard.php");
        }
        exit();
    } else {
        echo "Incorrect password";
    }
} else {
    echo "User not found";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signin.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                
    <title>Signin</title>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="#">Special treats</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="#" >Sign Up</a></li>

    </ul>
    </div>

    <div class="signin">
        <div class="wrapper">
            <h2>Sign In</h2>
            <form class="singinData" action="signin.php" method="POST">
            
            <input type="text" name="email" placeholder="Enter Your Email">
          <input type="password" name="password" placeholder="Enter Your Password">
           <input type="submit" value="Sign In">
            
        </form>
            <h2>Don't have an account? <a href="#" style="text-decoration:none; color:#004f44">Sign Up</a></h2>
        </div>
    </div>

    <div class="footer">
       <div class="socialMedia">
       <a href="#"><img src="../assets/TwitterX.png" alt="twitter"></a>
        <a href="#"><img src="../assets/Facebook.png" alt="twitter"></a>
        <a href="#"><img src="../assets/insta.png" alt="twitter"></a>
       </div>
       <div class="rights">
        <h2>All rights are preserved 2024</h2>
       </div>

    </div>
</body>
</html>