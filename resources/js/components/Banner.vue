<template>
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <h1>Il cibo che vuoi<br>comodamente dal tuo divano</h1>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Banner'
}
</script>

<style lang="scss" scoped>
.banner {
    background-image: url('../../assets/img/jumbotron.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    padding: 250px 0;
    position: relative;
    box-shadow:inset 0 0 0 2000px rgba(0,0,0,0.5);

    h1 {
        color: white;
        font-weight: 700;
    }
}
</style>