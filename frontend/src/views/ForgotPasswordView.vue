<template>
    <Message v-if="viewMessage" :message="message" />
    <main>
    <div class="container">
        <button class="back-button">
            <a href="/">
                <p><</p>
            </a>
        </button>
        <h1>Esqueceu a senha?</h1>
        <form id="form">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="Ícone de e-mail">
                <input type="email" placeholder="Digite seu e-mail" name="email">
            </fieldset>
            <button @click.prevent="submitData">Enviar</button>
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

                fetch("http://localhost:8000/forgot",{
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