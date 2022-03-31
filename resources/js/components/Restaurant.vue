<template>
    <div class="restaurant">
        <div class="container">
            <!-- SEARCHBAR -->
            <div class="searchbar-container animate__animated animate__fadeInUp animate_delay-5s">
                <h6>Cerca per ristorante o categoria</h6>
                <div class="input-group rounded">
                    <input @keyup="getFilteredRestaurants()" type="search" class="form-control rounded" placeholder="Cerca" v-model="inputText">
                </div>
                <!-- CHECKBOX -->
                <div class="check_container mt-2">
                    <div class="row row-cols-3">
                            <div class="col" v-for="category in categories" :key="category.id">  
                                <input type="checkbox" v-model="checkbox" :value="category.name">
                                <label>{{category.name}}</label>
                           </div>
                    </div>
                </div>
                <!-- END CHECKBOX -->
            </div>
            <!-- END SEARCHBAR -->
            <h2 class="text-center page_titles">I nostri ristoranti</h2>
            <div class="restaurant-wrapper ">
                <div class="d-flex justify-content-center flex-wrap" v-if="filteredRestaurants.length > 0" >
                    <div v-for="restaurant in filteredRestaurants" :key="restaurant.id" >
                        <!-- RESTAURANT CARD -->
                        <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;">
                            <div class="card-body text-center">
                                <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                <!-- <p class="card-text">Testo di prova</p> -->
                                <div class="decoration"></div>
                                <!-- <button class="btn restaurant_btn" >Vai al ristorante</button> -->
                                <a class="btn restaurant_btn" :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`"> Vai al ristorante</a>
                                <!-- <router-link :to="{
                            name: 'restaurant.details',
                            params: { slug: restaurant.slug }
                        }">
                        <button class="btn restaurant_btn">
                            Vai al ristorante
                        </button>
                        </router-link> -->
                            </div>
                        </div>
                        <!-- END RESTAURANT CARD -->
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap" v-else-if="filteredRestaurants.length <= 0 && checkbox.length <= 0">
                    <div v-for="restaurant in restaurants" :key="restaurant.id" >
                        <!-- RESTAURANT CARD -->
                        <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;">
                            <div class="card-body text-center">
                                <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                <!-- <p class="card-text">Testo di prova</p> -->
                                <div class="decoration"></div>
                                <a class="btn restaurant_btn" :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`"> Vai al ristorante</a>
                                

                                <!-- <router-link :to="{
                            name: 'restaurant.details',
                            params: { slug: restaurant.slug }
                        }">
                        <button class="btn restaurant_btn">
                            Vai al ristorante
                        </button>
                        </router-link> -->
                            </div>
                        </div>
                        <!-- END RESTAURANT CARD -->
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap" v-else>
                    <div v-for="restaurant in restaurants" :key="restaurant.id" >
                        <div v-for="category in restaurant.category" :key="category.id">
                            <div v-if="checkbox.includes(category.name)">
                                <!-- SINGLE RESTAURANT CARD -->
                                <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;">
                                    <div class="card-body text-center">
                                        <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                        <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                        <!-- <p class="card-text">Testo di prova</p> -->
                                        <div class="decoration"></div>
                                        <!-- <router-link :to="{
                                    name: 'restaurant.details',
                                    params: { slug: restaurant.slug }
                                }">
                                <button class="btn restaurant_btn">
                                    Vai al ristorante
                                </button>
                                </router-link> -->
                                    <a class="btn restaurant_btn" :href="`http://127.0.0.1:8000/restaurants/${restaurant.slug}`"> Vai al ristorante</a>

                                    </div>
                                </div>
                                <!-- END SINGLE RESTAURANT CARD -->
                            </div>
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
            restaurants: [],
            categories: [],
            filteredRestaurants: [],
            filteredCategories: [],
            inputText: '',
            checkbox: [],
            filter: []
        };
    },
    methods: {
        
        searchAllRestaurants() {
        axios.get(`http://127.0.0.1:8000/api/restaurants`)
        .then((response) => {
          this.restaurants = response.data;
        })
        .catch(() => {});
        },
        searchAllCategory() {
        axios.get(`http://127.0.0.1:8000/api/categories`)
        .then((response) => {
          this.categories = response.data.results;
        })
        .catch(() => {});
        },
        getFilteredRestaurants() {
            this.filteredRestaurants = [];
            this.restaurants.forEach(restaurant => {
                    if(restaurant.restaurant_name.toLowerCase().includes(this.inputText.toLowerCase().trim()) && this.inputText.trim() !== '') {
                        this.filteredRestaurants.push(restaurant);
                    } 
                    return this.filteredRestaurants;
                });
                
        },
        
        
        
    },
    created:function(){
        this.searchAllRestaurants();
        this.searchAllCategory();
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';


.restaurant {
    // BACKGROUND COLOR
        position:relative;
         
        background: linear-gradient(67deg, #7c2a02, #121c19, #f3ba32);
        background-size: 600% 600%;

        -webkit-animation: AnimationName 23s ease infinite;
        -moz-animation: AnimationName 23s ease infinite;
        animation: AnimationName 23s ease infinite;
    

    @-webkit-keyframes AnimationName {
        0%{background-position:51% 0%}
        50%{background-position:50% 100%}
        100%{background-position:51% 0%}
    }
    @-moz-keyframes AnimationName {
        0%{background-position:51% 0%}
        50%{background-position:50% 100%}
        100%{background-position:51% 0%}
    }
    @keyframes AnimationName {
        0%{background-position:51% 0%}
        50%{background-position:50% 100%}
        100%{background-position:51% 0%}
    }
    // BACKGROUND COLOR

    .container {
        .searchbar-container {
            max-width: 400px;
            padding: 20px 20px 40px 20px;
            border-radius: 10px;
            // margin-top: 30px;
            background-color: darken(#fec866, 20%);
            position:absolute;
            top:-134px;
            left: 109px;
           @media (max-width: 1050px) { 
               top:-60px;
            }
            @media (max-width: 992px) { 
               top:-35px;
            }


            h6 {
                color: #7c2a02;
                font-size: 18px;
                font-weight: 600;
            }

            input {
                border: 2px solid $page_secondary_color;
            }

            span {
                background-color: #7c2a02;
                color: darken(#fec866, 20%);
                cursor: pointer;
            }
        }
        .restaurant-wrapper {
            display: flex;
            flex-wrap: wrap;
            padding-top:60px;

            .card-img-top{
                width: 246px;
                object-fit: cover;
                
            }
           
        }
        
    }
}
</style>