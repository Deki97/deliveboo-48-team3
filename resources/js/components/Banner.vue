<template>
    <div class="banner">
        <div class="container">
            <div class="banner-text">
                <h1>Il cibo che vuoi<br>comodamente dal tuo divano</h1>
                <div class="searchbar-container">
                    <h6>Cerca per ristorante o categoria</h6>
                    <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Cerca" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0 ml-3" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                </div>
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
@import '../../sass/app.scss';

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

    .searchbar-container {
        max-width: 400px;
        background-color: pink;
        padding: 20px 20px 40px 20px;
        border-radius: 10px;
        margin-top: 30px;
        background-color: rgba($page_primary_color, .4);
        border: 2px solid $page_secondary_color;

        h6 {
            color: white;
        }

        input {
            border: 2px solid $page_secondary_color;
        }

        span {
            background-color: $page_secondary_color;
            cursor: pointer;
        }
    }
}
</style>