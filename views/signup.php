<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Form</title>
    <link rel="shortcut icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/styles/reset.css">
    <link rel="stylesheet" href="../assets/styles/index.css">
</head>
<body>
    <div class="container">
        <h1>Registration</h1>
        <form id="signupForm">
            <fieldset>
                <img src="../assets/images/user.svg" alt="user icon">
                <input type="text" placeholder="Enter your name" name="username">
            </fieldset>
            <fieldset>
                <img src="../assets/images/mail.svg" alt="mail icon">
                <input type="email" placeholder="Enter your email" name="email">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="lock icon">
                <input type="password" placeholder="Create a password" name="password">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="lock icon">
                <input type="password" placeholder="Confirm the password" name="confirmPassword">
            </fieldset>
            <div class="terms">
                <input type="checkbox">
                <span>I accept all terms & conditions</span>
            </div>
            <button>Register Now</button>
            <p>Already have an account? <a href="/">Login now</a></p>
        </form>
    </div>

    <script>
        document.querySelector("#signupForm").addEventListener("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(this);

            fetch("../controller/SignupController.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);

                if (data.trim() === "success") {
                    window.location.replace("/home");
                } else {
                    alert(data);
                }
            })
            .catch(error => {
                console.error("Erro:" . error);
            })
        }) 
    </script>
</body>
</html>