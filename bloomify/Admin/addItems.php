<?php
include '../config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/addItems.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                
    <title>Add Items</title>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#"></a></li>
        <li><a href="./shop.php">Manage Shop </a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="#" >Log out</a></li>

    </ul>
    </div>
    <div class="addItems">
        <div class="title">
            <h2>Hello Admin</h2>
            <h3>Add new Item</h3>
        </div>
        <div class="item">
                <button class="add">
                    <h2>Add picture of item in here</h2>
                    <img src="../assets/b.png" alt="">
                </button>
                <input type="text" name="name" placeholder="Product name">
                <input type="text" name="price" placeholder="Product price">
            </div>
        <button class="addItem">Add Item</button>
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


</body>