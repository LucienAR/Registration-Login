<?php
session_start();
require "connectdb.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
}
//check error
if (empty($email)) {
    $_SESSION['error'] = "Please enter your email";
    header("location: login.php");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "Please enter a valid email address";
    header("location: login.php");
} else if (empty($password)) {
    $_SESSION['error'] = "Please enter your password";
    header("location: login.php");
} else {
    try {
        //check email
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $userData = $stmt->fetch();
        //check password
        if ($userData && password_verify($password, $userData['password'])) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['success'] = "Login Successfully!";
            header("location: dashboard.php");
        } else {
            $_SESSION['error'] = "Invalid email or password";
            header("location: login.php");
        }
    } catch (PDOException $e) {
        $_SESSION['error'] = "Something went wrong";
        header("location: login.php");
    }
}

?>