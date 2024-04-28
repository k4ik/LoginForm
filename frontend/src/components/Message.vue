<template>
    <div class="message">
        <p>{{ message }}</p>
    </div>
</template>

<script>
    export default {
        props: ["message"],
    }
</script>

<style lang="scss" scoped>
@import "../assets/scss/_message.scss";
</style>    