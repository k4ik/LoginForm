<template>
    <div class="container">
        <h1>Login</h1>
        <form id="loginForm">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="mail icon">
                <input type="text" placeholder="Enter your email" name="email">
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
</template>

<script>
    export default {
        
    }
</script>