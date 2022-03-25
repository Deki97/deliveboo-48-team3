<template>
    <div>
        <!-- Header -->
        <Header />

        <main>
            <router-view></router-view>
        </main>

        <!-- Footer -->
        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
export default {
    name: 'App',
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
// @import './sass/variables.scss';
// @import './sass/general.scss';
@import '../../sass/app.scss';

</style>


