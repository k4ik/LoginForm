<template>
    <main>
        <div class="container">
            <button class="back-button">
                <a href="/forgot-password">
                    <p><</p>
                </a>
            </button>
            <h1>Verification Code</h1>
            <form id="form">
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
    </main>
</template>

<script>
    export default {
        
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/_form.scss";
</style>