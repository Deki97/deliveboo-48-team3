<template>
    <div class="home">
        <Banner @restaurants = 'searchDone' />
        <!-- {{getFilteredRestaurants()}} -->
        <Categories />
        <Restaurant :restaurantFiltered="filteredRestaurants" />
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
    },
    data:function(){
        return{
            filteredRestaurants: [],
            searchBar:'',
            allRestaurants: [],

        }
    },
      methods:{
        searchDone:function(value){
        this.searchBar = value;
        
        },

         getAllRestaurants() {
            axios.get('http://127.0.0.1:8000/api/restaurants')
            .then((response) => {
                this.allRestaurants = response.data;
                // console.log(this.allRestaurants);
            });
        },
    
        
    },
    computed:{
         getFilteredRestaurants:function() {
            this.filteredRestaurants = [];
            this.allRestaurants.forEach(restaurant => {
                    if(restaurant.restaurant_name.toLowerCase().includes(this.searchBar.toLowerCase().trim()) && this.searchBar.trim() !== '') {
                        this.filteredRestaurants.push(restaurant);
                    } 
                    
                });
                return this.filteredRestaurants;
                
        }
    },

  
    created:function(){
        this.getAllRestaurants();
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

.home {
    background-color: $page_tertiary_color;
}
</style>