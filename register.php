<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phoneNumber']);
    $user_type = $_POST['user_type'];

    $select_users = mysqli_query($conn, "SELECT * FROM users WHERE email='$email' AND password='$password'") or die("query failed");

    if(mysqli_num_rows($select_users) > 0){
        $message[]='User already exists!';
    }else{
        if($password!=$cpassword){
            $message[] = 'Confirm password not matching.';
        }else{
            if(str_contains($email, "admin") && $user_type == "admin"){
                mysqli_query($conn, "INSERT INTO users (name, email, password, user_type, phoneNumber) VALUES ('$name', '$email', '$cpassword', '$user_type', '$phoneNumber')") or die('query failed!');
                $message[] = 'Registered Successfully!';
                header('location:index.php');
            }elseif(!str_contains($email, "admin") && $user_type == "admin"){
                $message[] = 'Please set user type to "user".';
            }elseif(str_contains($email, "admin") && $user_type=="user"){
                $message[] = 'Please set user type to "admin".';
            }
            else{
                mysqli_query($conn, "INSERT INTO users (name, email, password, user_type, phoneNumber) VALUES ('$name', '$email', '$cpassword', '$user_type', '$phoneNumber')") or die('query failed!');
                $message[] = 'Registered Successfully!';
                header('location:index.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fa-solid fa-xmark" onclick="this.parentElement.remove();"></i>                
            </div>
            ';
        }
    }
    ?>

    <div class="box">
        <span class="borderline"></span>
        <form action="" method="post">
            <h2>Register</h2>
            <div class="inputbox">
                <input type="text" name="name" required>
                <span>Name</span>
                <i></i>
            </div>

            <div class="inputbox">
                <input type="email" name="email" required>
                <span>Email</span>
                <i></i>
            </div>

            <div class="inputbox">
                <input type="password" name="password" required>
                <span>Password</span>
                <i></i>
            </div>

            <div class="inputbox">
                <input type="password" name="cpassword" required>
                <span>Confirm Password</span>
                <i></i>
            </div>

            <div class="inputbox">
                <input type="text" name="phoneNumber" required>
                <span>Phone Number</span>
                <i></i>
            </div>

            <div class="inputbox">
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                <i></i>
            </div>

            <div class="links">
                <a href="#">Forget Password</a>
                <a href="index.php">Login</a>
            </div>

            <input type="submit" value="Register" name="submit">
        </form>
    </div>

<script src="https://kit.fontawesome.com/eedbcd0c96.js" crossorigin="anonymous"></script>
</body>
</html>