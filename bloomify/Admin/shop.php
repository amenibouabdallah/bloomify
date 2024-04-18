<?php
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
    // Check if product_id is provided
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];
        
        // Prepare and execute SQL statement to delete the product
        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);

        if ($stmt->execute()) {
            // Product deleted successfully
            header("Location: manageShop.php"); // Redirect back to the manage shop page
            exit();
        } else {
            // Error occurred while deleting product
            echo "Error: " . $conn->error;
        }
    } else {
        // Product ID not provided
        echo "Product ID not provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/manageShop.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                
    <title>Manage Your Shop</title>
</head>

<body>
<div class="navbar">
    <ul>
        <li><a href="#">Dashboard</a></li>
        <li><a href="#"></a></li>
        <li><a href="#"> </a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="#" >Log out</a></li>

    </ul>
    </div>
    

    
    <div class="shop">
    <div class="title">
            <h2> Hello Admin</h2>
            </div> 
            <h4> Manage your shop</h4>
             
            <?php foreach ($products as $product): ?>
                <div class="card">
                    <img src="../uploads/<?php echo $product['product_image']; ?>" alt="">
                    <div class="details">
                        <h2><?php echo $product['product_name']; ?></h2>
                        <h2>$<?php echo $product['product_price']; ?></h2>
                        <form action="" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <button type="submit">Delete</button>
                    </form>
                    </div>
                   
                </div>
            <?php endforeach; ?>
            <button class="Add"><a  href="./AddItems.php">Add new Item</a></button>   

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



</body>