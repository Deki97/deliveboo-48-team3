<template>
    <div class="home">
        <Banner />
        <Categories />
        <Restaurant />
    </div>
</template>

<script>
import Banner from '../components/Banner.vue';
import Categories from './Categories.vue';
import Restaurant from '../components/Restaurant.vue';

export default {
    name: 'Home',
    components: {
        Banner,
        Categories,
        Restaurant
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

.home {
    background-color: $page_tertiary_color;
}
</style>