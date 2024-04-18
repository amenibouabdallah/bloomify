<?php
session_start();

include '../config.php';
$sql = "SELECT * FROM product";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get user ID from session
    $user_id = $_SESSION['user_id'];
    
    // Get product ID from the form
    $product_id = $_POST['product_id'];

    // Insert the product into the cart
    $sql = "INSERT INTO orderss (user_id, product_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $product_id);
    
    if ($stmt->execute()) {
        // Product added to cart successfully
        header("Location: ./cart.php");
        exit();
    } else {
        // Error occurred while adding product to cart
        echo "Error: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/shop.css">
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

    <div class="shop">
            <h4> Our Special Treats</h4>
            <div class="title">
            <h2> Featured</h2>
            </div>   
            <div class="items">
               
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <img src="../uploads/<?php echo $product['product_image']; ?>" alt="">
                    <div class="details">
                        <h2><?php echo $product['product_name']; ?></h2>
                        <h2>$<?php echo $product['product_price']; ?></h2>
                        <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <form action="" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
    <button type="submit">Buy</button>
</form>
                    </form>
                    </div>
                   
                </div>
            <?php endforeach; ?>
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