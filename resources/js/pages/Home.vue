<template>
    <div class="home">
        <Banner />
        <CategorySlider />
    </div>
</template>

<script>
import Banner from '../components/Banner.vue';
import CategorySlider from '../components/CategorySlider.vue'

export default {
    name: 'Home',
    components: {
        Banner,
        CategorySlider,
    }
}
</script>

<style lang="scss" scoped>

</style>