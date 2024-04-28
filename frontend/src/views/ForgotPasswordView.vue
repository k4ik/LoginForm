<template>
    <main>
        <div class="container">
            <button class="back-button">
                <a href="/">
                    <p><</p>
                </a>
            </button>
            <h1>Forgot Password</h1>
            <form id="form">
                <fieldset>
                    <img src="../assets/images/mail.svg" alt="mail icon">
                    <input type="email" placeholder="Enter your email" name="email">
                </fieldset>
                <button>Submit</button>
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