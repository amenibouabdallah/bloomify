<?php
include '../config.php';
$sql = "SELECT * FROM product LIMIT 3";
$result = $conn->query($sql);

$products = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.cdnfonts.com/css/kapakana" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
                

    <title>Bloomify</title>
</head>
<body>
    <div class="navbar">
    <ul>
        <li><a href="#shop">Special treats</a></li>
        <li><a href="#contactus">Contact Us</a></li>
        <li><a href="#aboutus">About Us</a></li>
        <li class="logo" style="float:center" >Bloomify</li>
        <li style="float:right"><a href="../auth/singup.php" >Sign Up</a></li>

    </ul>
    </div>
    <div class="home">
    <div class="intro">
        <h3>Happiness blooms from within</h3>
        <p>Our environment, the world in which we live and work, is a mirror of our attitudes and expectations.</p>
        <div class="buttons">
<button class="b1"><a href="#" class="shop">Shop Now</a></button> 
           <a href="./auth/singup.php" class="explore">Explore plants <img src="../assets/Arrow 1.png" alt=""></a>
        </div>
    </div>
    <div class="gallery">
        <div class="gallery1">
        <img src="../assets/image 3.png" alt="">
        <img src="../assets/image 2.png" alt="">
        </div>
        <div class="gallery2">
        <img src="../assets/Group 11.png" alt="">

        </div>
    </div>
    </div>
    <div class="shop" id="shop">
            <h4> Our Special Treats</h4>
            <div class="title">
            <h2> Featured</h2>
            <a href="../auth/singup.php" class="view" >view all</a>
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
                        <button ><a href="../auth/singup.php">BUY</a></button>
                    </form>
                    </div>
                   
                </div>
            <?php endforeach; ?>
            </div>         
    </div>
    <div class="parallax">

    </div>
    <div class="aboutUs" id="aboutus">
     <div class="aboutUsText">
        <h1 style="font-family:'Poppins',sans-serif;">
            Meet the creative hands behind <span style="font-family: 'Kapakana' , sans-serif;">Bloomify</span>
        </h1>
        <p>At Bloomify, creativity blooms at every turn, thanks to the diligent minds shaping our vision. Our team embodies a fusion of passion, innovation, and expertise, crafting an immersive floral experience unlike any other. Rooted in a deep appreciation for nature's beauty, we strive to bring enchantment to every bouquet, arrangement, and customer interaction.</p>
        <p>With dedication as our cornerstone, our artisans curate each floral masterpiece with meticulous care, infusing every petal with emotion and meaning. Behind the scenes, our designers blend traditional artistry with contemporary flair, ensuring that every creation exudes timeless elegance and allure.</p>
        <p>At the heart of Bloomify lies a commitment to exceeding expectations, fueled by our relentless pursuit of excellence. We thrive on the joy that our floral creations bring to our cherished customers, celebrating life's moments both big and small. Our mission is simple: to spread happiness, one exquisite bloom at a time.</p>
     </div>
     <img src="../assets/image 14.png" alt="">
    </div>
    <div class="contactUs" id="contactus">
        <div class="wrapper">
            <div class="contactDetailsInput">
                <h2>CONTACT US</h2>
                <label for="fullName">Full Name</label>
                <input type="text" name="fullName" placeholder="Enter your name">
                <label for="email">Email adress</label>
                <input type="text" name="email" placeholder="Enter your Email adress">
                <label for="message">Message</label>
                <textarea id="subject" name="subject" placeholder="Write something.." ></textarea>
                <input type="submit" value="Submit" class="submit">
            </div>
            <div class="contactDetails">
                <h2>Contact</h2>
                <h4 style="color: #004F44;
    font-size: 26px;">Bloomify@gmail.com</h4>
                <h2>Based in</h2>
                <h4 style="color: #004F44;
    font-size: 26px;" >Tunisia, Tunisia, Downtown</h4>
                <img src="../assets/Maps.png" alt="">
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
</html>