<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification Code</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/index.css">
</head>
<body>
    <div class="container">
        <button class="forgot-password-button">
            <a href="/forgot-password">
                <p><</p>
            </a>
        </button>
        <h1>Verification Code</h1>
        <form action="../controller/VerificationCodeController.php" method="post">
            <fieldset>
                <img src="../assets/images/key.svg" alt="mail icon">
                <input type="text" placeholder="Enter your code" name="code">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="mail icon">
                <input type="text" placeholder="Enter your new password" name="newPassword">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="mail icon">
                <input type="text" placeholder="Confirm your new password" name="confirmedPassword">
            </fieldset>
            <button>Update password</button>
        </form>
    </div>
</body>
</html>