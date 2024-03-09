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
        <a href="/">
            <button class="forgot-password-button">
                <p><</p>
            </button>
        </a>
        <h1>Forgot Password</h1>
        <form action="../controller/ForgotPasswordController.php" method="post">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="">
                <input type="email" placeholder="Enter your email" name="email">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="">
                <input type="password" placeholder="Old Password" name="oldPassword">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="">
                <input type="password" placeholder="New password" name="newPassword">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="">
                <input type="password" placeholder="Confirm new password" name="confirmNewPassword">
            </fieldset>
            <button>Update Password</button>
        </form>
    </div>
</body>
</html>