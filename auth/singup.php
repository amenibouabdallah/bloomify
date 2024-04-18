
<?php
session_start();

include '../config.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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
    
    // Validate file upload
    $uploadResult = validateFileUpload($_FILES['image']);
    if ($uploadResult !== true) {
        echo $uploadResult;
        exit();
    }

    // Move uploaded file to target directory
    $targetFile = moveUploadedFile($_FILES['image']);

    // Insert user into database
    $insertResult = insertUserIntoDatabase($conn, $email, $fullName, $dateOfBirth, $password, $address, $city, $state, $postal, $targetFile);
    if ($insertResult === true) {
        header("Location: ./signin.php");

    } else {
        echo "Error: " . $insertResult;
    }
}

function validateFileUpload($file) {
    // Check if file is an image
    $check = getimagesize($file['tmp_name']);
    if ($check === false) {
        return "File is not an image.";
    }
    
    // Check file size
    if ($file['size'] > 500000) {
        return "Sorry, your file is too large.";
    }

    // Allow only certain file formats
    $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($imageFileType, $allowedFormats)) {
        return "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    return true;
}

function moveUploadedFile($file) {
    $targetDirectory = "../uploads/profile";
    $targetFile = $targetDirectory . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return $targetFile;
    } else {
        return "Sorry, there was an error uploading your file.";
    }
}

function insertUserIntoDatabase($conn, $email, $fullName, $dateOfBirth, $password, $address, $city, $state, $postal, $profilePicture) {
    $sql = "INSERT INTO user (email, fullname, date_of_birth, password, street_address, city, state, postal_code, profile_picture)
            VALUES ('$email', '$fullName', '$dateOfBirth', '$password', '$address', '$city', '$state', '$postal', '$profilePicture')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return $conn->error;
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
        <li><a href="../homePage/index.php">Special treats</a></li>
        <li><a href="../homePage/index.php">Contact Us</a></li>
        <li><a href="../homePage/index.php">About Us</a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="./signin.php" >Sign In</a></li>

    </ul>
    </div>
    <div class="signup">
    <div class="wrapper">
        <h2>Sign Up</h2>
        <form action="" method="POST" enctype="multipart/form-data">
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
        <h2>Already have an account? <a href="./signin.php">Sign In</a></h2>
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