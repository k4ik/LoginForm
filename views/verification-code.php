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
        <form id="verificationForm">
            <fieldset>
                <img src="../assets/images/key.svg" alt="mail icon">
                <input type="text" placeholder="Enter your code" name="code">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="mail icon">
                <input type="password" placeholder="Enter your new password" name="newPassword">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="mail icon">
                <input type="password" placeholder="Confirm your new password" name="confirmedPassword">
            </fieldset>
            <button>Update password</button>
        </form>
    </div>

    <script>
        document.querySelector("#verificationForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch("../controller/VerificationCodeController.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                if (data.trim() === "Password updated successfully!") {
                    window.location.replace("/home");
                } else {
                    alert(data);
                }            })
            .catch(error => {
                console.error("Erro:" . error);
            })
        }) 
    </script>
</body>
</html>