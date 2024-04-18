<?php
include 'config.php';
if(isset($_POST['submit'])){
    $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST["password"]);

    $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'user already exist!';
    }else{
        
            $insert = " INSERT INTO user(fullName, email, password) VALUES('$fullName','$email','$pass')";
            mysqli_query($conn, $insert);
            header(location:home.php);
        
    }

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>
    <h3>welcome</h3>
    <?php
       
       if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        };
       };
    ?>
    <form action="" method="post">
        <input type="text" name="fullName" required placeholder="enter your name">
        <input type="email" name="email" placeholder="enter your mail">
        <input type="password" name="password" placeholder="enter your pass">  
        <input type="submit" name="submit" vamue="submit">
    </form>
    
</body>
</html>