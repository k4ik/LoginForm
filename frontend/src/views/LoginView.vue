<template>
    <Message v-if="viewMessage" :message="message" />
    <main>
    <div class="container">
        <h1>Login</h1>
        <form id="form">
            <fieldset>
                <img src="../assets/images/mail.svg" alt="Ícone de e-mail">
                <input type="text" placeholder="Digite seu e-mail" name="email">
            </fieldset>
            <fieldset>
                <img src="../assets/images/lock.svg" alt="Ícone de cadeado">
                <input type="password" placeholder="Digite sua senha" name="password">
            </fieldset>
            <div class="spans">
                <div class="terms">
                    <input type="checkbox">
                    <span>Lembrar-me</span>
                </div>
                <span><a href="/forgot-password">Esqueceu a senha?</a></span>
            </div>
            <button @click.prevent="submitData">Entrar</button>
            <p>Ainda não tem uma conta? <a href="/signup">Cadastre-se agora</a></p>
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