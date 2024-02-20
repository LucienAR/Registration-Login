<?php
session_start();
require 'connectdb.php';
$minLength = 8;

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPasswrod = $_POST['confirm_password'];
}
if (empty($username)) {
    $_SESSION['error'] = "Please enter your username";
    header("location: registration.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Please enter a valid email address";
    header("location: registration.php");
} else if (strlen($password) < $minLength) {
    $_SESSION['error'] = "Please enter a valid password";
    header("location: registration.php");
} else if ($password !== $confirmPasswrod) {
    $_SESSION['error'] = "Your password do not match";
    header("location: registration.php");
} else {
    
    $checkUsername = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username =?");
    $checkUsername->execute([$username]);
    $userNameExists = $checkUsername->fetchcolumn();
    
    $checkEmail = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email =?");
    $checkEmail->execute([$email]);
    $userEmailExists = $checkEmail->fetchcolumn();
    //check duplicate name
    if ($userNameExists) {
        $_SESSION['error'] = "Username already exists";
        header("location: registration.php");
    }
    //check duplicate email
    else if ($userEmailExists) {
        $_SESSION['error'] = "Email already exists";
        header("location: registration.php");

    } else {
        //hashed password for keep in to database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        try {
            //insert data to database
            $stmt = $pdo->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
            $stmt->execute([$username, $email, $hashedPassword]);
            $_SESSION['success'] = "Registration Successfully";
            header("location: login.php");

        } catch (PDOException $e) {
            $_SESSION['error'] = "Something went wrong, please try again";
            echo "Registration failed:" . $e->getMessage();
            header("location: registration.php");
        }
    }

}
?>