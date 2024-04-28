<template>
    <Message v-if="viewMessage" :message="message" />
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
                <button @click.prevent="submitData">Register Now</button>
                <p>Already have an account? <a href="/">Login now</a></p>
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

                fetch("http://localhost:8000/register",{
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