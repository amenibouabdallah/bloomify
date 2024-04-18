<?php
include '../config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];

    // Check if all required fields are provided
    if (!empty($product_name) && !empty($product_price)) {
        // Check if product image is uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $image = $_FILES['image']['name']; // Get the name of the uploaded image
            $targetDirectory = "../uploads/"; // Directory to store uploaded images
            $targetFile = $targetDirectory . basename($image); // Path to uploaded image
            
            // Move uploaded image to target directory
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                // Insert product into database
                $sql = "INSERT INTO product (product_name, product_price, product_image) VALUES (?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sds", $product_name, $product_price, $image);
                
                if ($stmt->execute()) {
                    // Product added successfully
                    header("Location: ./shop.php"); 
                } else {
                    // Error occurred while adding product
                    echo "Error: " . $conn->error;
                }
            } else {
                // Error occurred while uploading image
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // Product image not uploaded
            echo "Please upload an image of the product.";
        }
    } else {
        // Required fields are missing
        echo "Please provide product name and price.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

// Close database connection
$conn->close();
?>
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
        <form action="" method="POST" enctype="multipart/form-data">

       <div class="item">
                <input type="file" name="image" accept="image/*">
                <input type="text" name="name" placeholder="Product name">
                <input type="text" name="price" placeholder="Product price">
            </div>
        <button type="submit" class="addItem">Add Item</button>
       </form>
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