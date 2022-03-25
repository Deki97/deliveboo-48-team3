import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from './pages/Home.vue';
import About from './pages/About.vue';
import WorkWithUs from './pages/WorkWithUs.vue';
import Contacts from './pages/Contacts.vue';
import NotFound from './pages/NotFound.vue';

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/chi-siamo",
            name: "chi-siamo",
            component: About
        },
        {
            path: "/lavora-con-noi",
            name: "lavora-con-noi",
            component: WorkWithUs
        },
        {
            path: "/contattaci",
            name: "contattaci",
            component: Contacts
        },
        // {
        //     path: "/blog/:slug",
        //     name: "post-details",
        //     component: PostDetails
        // },
        // {
        //     path: "/latest-news",
        //     name: "latest-news",
        //     component: LatestNews
        // },
        
        // {
        //     path: "/tags/:slug",
        //     name: "tag-details",
        //     component: TagDetails
        // },
        // {
        //     path: "/contacts",
        //     name: "contacts",
        //     component: Contacts
        // },
        {
            path: "/*",
            name: "not-found",
            component: NotFound
        },
    ]
});

export default router;