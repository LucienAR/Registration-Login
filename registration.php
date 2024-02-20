<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>
    <!-- header -->
    <div class="container">
        <?php include('header.php') ?>
    </div>
    <!-- sign up form -->
    <main class="form-signin w-100 m-auto">
        <form action="registerdb.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Sign Up</h1>

            <div class="form-floating">
                <input type="text" class="form-control my-2" name="username" placeholder="Enter your username">
                <label for="Username">Username</label>
            </div>

            <div class="form-floating">
                <input type="email" class="form-control my-2" name="email" id="floatingInput"
                    placeholder="Enter your email">
                <label for="Email address">Email address</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control my-2" name="password" id="floatingPassword"
                    placeholder="Enter your password" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$"
                    required title="Password must contain at least one number,  
                       one alphabet, one symbol, and be at  
                       least 8 characters long">
                <label for="Password">Password</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control my-2" name="confirm_password" id="floatingConfirmPassword"
                    placeholder="Confirm your password">
                <label for="Confirm password">Confirm password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" name="register" type="submit">Sign up</button>
            <p class="mt-5 mb-3 text-body-secondary">Already have an account? <a href="login.php">Sign In</a></p>
        </form>
    </main>
    <!-- alert message -->
    <div class="container">
        <?php include('script.php') ?>
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