<template>
    <Message v-if="viewMessage" :message="message" />
    <main>
        <div class="container">
            <h1>Login</h1>
            <form id="form">
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
                <button @click.prevent="submitData">Login Now</button>
                <p>Don't have an account? <a href="/signup">Signup now</a></p>
            </form>
        </div>
    </main>
</template>

<script>
    import Message from '../components/Message.vue';

    export default {
        components: {
            Message,
        },
        data() {
            return {
                viewMessage: false,
                message: ""
            }
        },
        methods: {
            submitData() {
                let form = document.getElementById("form")
                let formData = new FormData(form);

                fetch("http://localhost:8000/login",{
                    method: "POST",
                    body: formData
                })
                .then(response => {
                    return response.text(); 
                })
                .then(data => {
                    if(data == "success"){
                        this.$router.push("/home");
                    } else {
                        this.message = data;

                        setTimeout(()=>{
                            this.viewMessage = true;
                        }, 1000);

                        setTimeout(()=>{
                            this.viewMessage = false;
                        }, 5000);
                    }
                })
                .catch(error =>{
                    console.error(error);
                })
            },
        },

    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/_form.scss";
</style>