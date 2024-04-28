<template>
    <Message v-if="viewMessage" :message="message" />
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
                <button @click.prevent="submitData">Update password</button>
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

                fetch("http://localhost:8000/verification",{
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