<template>
    <Message v-if="viewMessage" :message="message" />
    <main>
        <div class="container">
            <button class="back-button">
                <a href="/forgot-password">
                    <p><</p>
                </a>
            </button>
            <h1>Código de Verificação</h1>
            <form id="form">
                <fieldset>
                    <img src="../assets/images/key.svg" alt="Ícone de chave">
                    <input type="text" placeholder="Digite seu código" name="code">
                </fieldset>
                <fieldset>
                    <img src="../assets/images/lock.svg" alt="Ícone de cadeado">
                    <input type="password" placeholder="Digite sua nova senha" name="newPassword">
                </fieldset>
                <fieldset>
                    <img src="../assets/images/lock.svg" alt="Ícone de cadeado">
                    <input type="password" placeholder="Confirme sua nova senha" name="confirmedPassword">
                </fieldset>
                <button @click.prevent="submitData">Atualizar senha</button>
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