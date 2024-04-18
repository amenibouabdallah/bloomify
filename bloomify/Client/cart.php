<?php
include '../config.php';
session_start();
// Get user ID from session
$user_id = $_SESSION['user_id'];

// Retrieve products from the ordersss table associated with the user
$sql = "SELECT p.product_price
        FROM orderss AS o
        INNER JOIN product AS p ON o.product_id = p.id
        WHERE o.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$total_price = 0; // Initialize total price variable

while ($row = $result->fetch_assoc()) {
    $total_price += $row['product_price']; // Add each product price to the total
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cart.css">
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
    </div>
    <div class="cart">
    <div class="title">
        <h2>My cart</h2>
    </div>
    <div class="p">
        <div class="cartContent">
            <?php
            // Fetch and display products from the database
            include '../config.php';
            
            // Get user ID from session
            $user_id = $_SESSION['user_id'];
            
            // Retrieve products from the ordersss table associated with the user
            $sql = "SELECT p.product_name, p.product_price, p.product_image
                    FROM orderss AS o
                    INNER JOIN product AS p ON o.product_id = p.id
                    WHERE o.user_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card">
                    <div class="cardImage">
                        <img src="../uploads/<?php echo $row['product_image']; ?>" alt="item">
                    </div>
                    <div class="cardDetails">
                        <h3><?php echo $row['product_name']; ?></h3>
                        <div class="pnb">
                            <h2 class="price">$<?php echo $row['product_price']; ?></h2>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="purchase">
            <img src="../assets/Fast.png" alt="cart">
            <h1>Total</h1>
            <h2>$<?php echo number_format($total_price, 2); ?></h2> <!-- Display the total price -->
            <button class="checkout" ><a href="./checkout.php">CHECKOUT</a></button>
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