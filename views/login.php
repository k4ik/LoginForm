<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/index.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form id="loginForm" action="../controller/LoginController.php" method="post">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="mail icon">
                <input type="email" placeholder="Enter your email" name="email">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="lock icon">
                <input type="password" placeholder="Enter your password" name="password">
            </fieldset>
            <div class="spans">
                <div class="terms">
                    <input type="checkbox">
                    <span>Remember me</span>
                </div>
                <span><a href="/forgot-password">Forgot password?</a></span>
            </div>
            <button>Login Now</button>
            <p>Don't have an account? <a href="/signup">Signup now</a></p>
        </form>
    </div>
</body>
</html>