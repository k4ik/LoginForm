<template>
    <main>
        <div class="container">
            <h1>Registration</h1>
            <form id="form">
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
                <button>Register Now</button>
                <p>Already have an account? <a href="/">Login now</a></p>
            </form>
        </div>
    </main>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/_form.scss";
</style>