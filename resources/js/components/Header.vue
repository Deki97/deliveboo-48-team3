<template>
    <header>
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand mx-3" href="#">Deliveboo</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active mx-3">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Chi siamo</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Lavora con noi</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a class="nav-link" href="#">Contattaci</a>
                    </li>
                    </ul>
                </div>
            </nav>
    </header>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

header {
    background-color: $page_primary_color;
    color: black;
    padding: 20px 0;
    font-size: 20px;
    text-transform: uppercase;
    
    nav {
        .navbar-toggler-icon i {
            color: black;
        }
    }
}
</style>