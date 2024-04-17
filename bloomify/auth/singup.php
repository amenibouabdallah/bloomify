<?php
session_start();

include '../config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $fullName = $_POST['fullName'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postal = $_POST['postal'];
    
    // File upload handling
    $targetDirectory = "../uploads/"; // Directory to store uploaded files
    $targetFile = $targetDirectory.basename($_FILES["image"]["name"]); // Path to uploaded file
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            
            // Insert user into database
            $sql = "INSERT INTO user (email, fullname, date_of_birth, password, street_address, city, state, postal_code, profile_picture)
                    VALUES ('$email', '$fullName', '$dateOfBirth', '$password', '$address', '$city', '$state', '$postal', '$targetFile')";
            
            if ($conn->query($sql) === TRUE) {
                echo "User registered successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/signup.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                
    <title>Signup</title>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="#">Special treats</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">About Us</a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="#" >Sign In</a></li>

    </ul>
    </div>
    <div class="signup">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST" enctype="multipart/form-data">
            <div class="signUpData">
                <input type="text" name="email" placeholder="Enter your email">
                <input type="text" name="fullName" placeholder="Enter your fullName">
                <input type="date" name="dateOfBirth" placeholder="Enter your date of birth">
                <input type="password" name="password" placeholder="Enter your password">
                <input type="text" name="address" placeholder="Enter your street address">
                <input type="text" name="city" placeholder="Enter your city">
                <input type="text" name="state" placeholder="Enter your state">
                <input type="text" name="postal" placeholder="Enter your postal code">
                <input type="file" name="image" accept="image/*"> <!-- File upload input -->
            </div>
            <input type="submit" name="submit" value="Sign Up">
        </form>
        <h2>Already have an account? <a href="#">Sign In</a></h2>
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