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
                        <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;" data-aos="fade-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="card-body text-center p-0">
                                <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                <!-- <img src="../../assets/img/prova-restaurant.png" alt=""> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 600"><path fill="#0099ff" fill-opacity="1" d="M0,0L48,21.3C96,43,192,85,288,138.7C384,192,480,256,576,282.7C672,309,768,299,864,256C960,213,1056,139,1152,122.7C1248,107,1344,149,1392,170.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
                                <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                <!-- <p class="card-text">Testo di prova</p> -->
                                <div class="decoration"></div>
                                <router-link :to="{
                            name: 'restaurant.details',
                            params: { slug: restaurant.slug }
                        }">
                        <button class="btn restaurant_btn">
                            Vai al ristorante
                        </button>
                        </router-link>
                            </div>
                        </div>
                        <!-- END RESTAURANT CARD -->
                    </div>
                </div>
                <div class="d-flex justify-content-center flex-wrap" v-else-if="filteredRestaurants.length <= 0 && checkbox.length <= 0">
                    <div v-for="restaurant in restaurants" :key="restaurant.id" >
                        <!-- RESTAURANT CARD -->
                        <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;" data-aos="fade-in" data-aos-duration="1000" data-aos-once="true">
                            <div class="card-body text-center p-0">
                                <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                <!-- <img src="../../assets/img/prova-restaurant.png" alt=""> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 600"><path fill="#0099ff" fill-opacity="1" d="M0,0L48,21.3C96,43,192,85,288,138.7C384,192,480,256,576,282.7C672,309,768,299,864,256C960,213,1056,139,1152,122.7C1248,107,1344,149,1392,170.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
                                <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                <!-- <p class="card-text">Testo di prova</p> -->
                                <div class="decoration"></div>
                                <router-link :to="{
                            name: 'restaurant.details',
                            params: { slug: restaurant.slug }
                        }">
                        <button class="btn restaurant_btn">
                            Vai al ristorante
                        </button>
                        </router-link>
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
                                <div class="card restaurant_cards mx-3 my-3" style="width: 18rem;" data-aos="fade-in" data-aos-duration="1000" data-aos-once="true">
                                    <div class="card-body text-center p-0">
                                        <img :src="restaurant.path_img" class="card-img-top" :alt="restaurant.restaurant_name">
                                <!-- <img src="../../assets/img/prova-restaurant.png" alt=""> -->
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 600"><path fill="#0099ff" fill-opacity="1" d="M0,0L48,21.3C96,43,192,85,288,138.7C384,192,480,256,576,282.7C672,309,768,299,864,256C960,213,1056,139,1152,122.7C1248,107,1344,149,1392,170.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg> -->
                                        <h5 class="card-title my-3">{{ restaurant.restaurant_name }}</h5>
                                        <!-- <p class="card-text">Testo di prova</p> -->
                                        <div class="decoration"></div>
                                        <router-link :to="{
                                    name: 'restaurant.details',
                                    params: { slug: restaurant.slug }
                                }">
                                <button class="btn restaurant_btn">
                                    Vai al ristorante
                                </button>
                                </router-link>
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
        background-color: lighten(#7c2a02, 40%);;
         
    //     background: linear-gradient(67deg, #7c2a02, #121c19, #f3ba32);
    //     background-size: 600% 600%;

    //     -webkit-animation: AnimationName 23s ease infinite;
    //     -moz-animation: AnimationName 23s ease infinite;
    //     animation: AnimationName 23s ease infinite;
    

    // @-webkit-keyframes AnimationName {
    //     0%{background-position:51% 0%}
    //     50%{background-position:50% 100%}
    //     100%{background-position:51% 0%}
    // }
    // @-moz-keyframes AnimationName {
    //     0%{background-position:51% 0%}
    //     50%{background-position:50% 100%}
    //     100%{background-position:51% 0%}
    // }
    // @keyframes AnimationName {
    //     0%{background-position:51% 0%}
    //     50%{background-position:50% 100%}
    //     100%{background-position:51% 0%}
    // }
    // BACKGROUND COLOR

    .container {
        .searchbar-container {
            max-width: 400px;
            padding: 20px 20px 40px 20px;
            border-radius: 10px;

            background-color: darken(#fec866, 20%);
            position:absolute;
            top:-134px;
            left: 109px;
            @media (max-width: 1050px) { 
               top:-60px;
            }

            @media (max-width: 992px) { 
               top:-35px;
               left: 30px;
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

            .restaurant_cards {
            // box-shadow: 4px 4px 25px $page_tertiary_color;
            border-radius: 10px;
            // background-color: lighten( black, 30%);
            // background-color: #fec866;
            background-color: darken(#fec866, 20%);
            margin: 0;
            padding: 0;
            height: 300px;

            // .card-img-top {
            //     width: 246px;
            //     object-fit: cover;
            // } 

                h5 {
                    color: black;
                    text-transform: capitalize;
                    font-weight: 600;
                }

                p {
                    color: $page_other_color;
                }
                // .decoration{
                //     width: 100%;
                //     margin: 50px 0;
                //     height: 2px;
                //     background-color: black;
                // }

                .card-body {
                    img {
                        border-top-left-radius: 10px;
                        border-top-right-radius: 10px;
                        // height: 200px;
                    }
                }
            }
            .restaurant_cards:hover {
                // box-shadow: 10px 10px 15px $page_tertiary_color;
                transform: translateY(-10px);
            }

            .restaurant_btn {
                // margin: 50px 2px 0;
                padding: 5px 15px;
                background-color: lighten(#311706, 40%);
                color: #7c2a02;
                // transition: 0.2s;
                border-radius: 10px;
                // box-shadow: 1px 1px 10px;
                
            }
        }
    }
}
</style>