<template>
    <div class="home">
        <Banner />
        <Categories />
    </div>
</template>

<script>
import Banner from '../components/Banner.vue';
import Categories from './Categories.vue';

export default {
    name: 'Home',
    components: {
        Banner,
        Categories
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

.home {
    background-color: $page_tertiary_color;
}
</style>