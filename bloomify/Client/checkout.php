<?php
include '../config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/checkout.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                
    <title>Shop</title>
</head>
<body>
<ul>
<li><a href="./home.php">Special treats</a></li>
        <li><a href="./home.php">Contact Us</a></li>
        <li><a href="./home.php">About Us</a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="../logout.php" >Log out</a></li>

    </ul>
    <div class="checkout">
        <div class="title"><h1>CHECK OUT</h1></div>
        <div class="checkoutg">
        <div class="g1">
            <h3>CREDIT CARD DETAILS</h3>
            <input class="cNum" type="text" placeholder="CARD NUMBDER">
            <input type="text" class="cName" placeholder="CARD HOLDER NAME">
            <div class="grid">
                <input class="date" type="text" placeholder="EXPIRY DATE">
                <input type="text" class="cvv" placeholder="CVV">
            </div>
            <button class="btn"><a href="./home.php">PAY</a></button>
        </div>
        <div class="g2">
            <img src="../assets/wallet.png" alt="">
        </div>
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