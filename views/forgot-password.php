<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/index.css">
</head>
<body>
    <div class="container">
        <button class="forgot-password-button">
            <a href="/">
                <p><</p>
            </a>
        </button>
        <h1>Forgot Password</h1>
        <form action="../controller/ForgotPasswordController.php" method="post">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="mail icon">
                <input type="email" placeholder="Enter your email" name="email">
            </fieldset>
            <button>Submit</button>
        </form>
    </div>
</body>
</html>