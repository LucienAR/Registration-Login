<?php
session_start();

if (isset($_SESSION['success'])) {
    include 'script.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="sign-in.css">
</head>

<body>
    <!-- header -->
    <div class="container">
        <?php include('header.php') ?>
    </div>
    <!-- sign in form -->
    <main class="form-signin w-100 m-auto">
        <form action="logindb.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Sign In</h1>

            <div class="form-floating">
                <input type="email" class="form-control my-2" name="email" id="floatingInput"
                    placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control my-2" name="password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" name="login" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-body-secondary">Don't have an account? <a href="registration.php">Sign Up</a></p>
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