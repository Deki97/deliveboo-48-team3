<template>
    <div class="restaurant">
        <div class="container">
            <h2>I nostri ristoranti</h2>
            <div class="restaurant-wrapper">
                    <div v-for="restaurant in restaurants" :key="restaurant.id" >
                        <div class="card mx-3 my-3" style="width: 18rem;">
                            <!-- <img class="card-img-top" src="..." alt="Card image cap"> -->
                            <div class="card-body">
                                <h5 class="card-title">{{ restaurant.restaurant_name }}</h5>
                                <p class="card-text">Testo di prova</p>
                                <router-link :to="{
                            name: 'restaurant.details',
                            params: { slug: restaurant.slug }
                        }">
                        <button class="btn btn-primary">
                            Vai al ristorante
                        </button>
                        </router-link>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'Restaurant',
    data:function(){
        return {
            restaurants: []
        };
    },
    methods: {
        // getRestaurants:function(){
        //     axios.get('/api/restaurants')
        //     .then((response) => {
                
        //             this.restaurants = response.data.results;
        //             // console.log(this.categories);
                
        //         // else{
        //         //     // this.$router.push({name:'not-found'});
        //         // }
        //     })
        // },
        searchAllRestaurants() {
        axios.get(`http://127.0.0.1:8000/api/restaurants`)
        .then((response) => {
          this.restaurants = response.data;
        })
        .catch(() => {});
        }
    },
    created:function(){
        this.searchAllRestaurants();
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

.restaurant {
    .container {
        .restaurant-wrapper {
            display: flex;
            flex-wrap: wrap;
        }
    }
}
</style>