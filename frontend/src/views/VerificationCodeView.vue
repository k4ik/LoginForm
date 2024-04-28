<template>
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
</template>

<script>
    export default {
        
    }
</script>