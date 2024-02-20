<?php
session_start();
require 'connectdb.php';

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
} else if (isset($_SESSION['success'])) {
    include 'script.php';
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>
    <!-- header -->
    <div class="container">
        <?php include('header.php') ?>
    </div>
    <?php
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

    }
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $userData = $stmt->fetch();
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();
    }
    ?>
    <div align="center">
        <h1>
            Welcome,
            <?php echo $userData['username'] ?>
        </h1>
        <h4>Your email is
            <?php echo $userData['email'] ?>
        </h4>

    </div>

    <!-- footer -->
    <div class="container">
        <?php include('footer.php') ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>