<template>
  <div>
    <!-- <HeaderRestaurant />
    <Jambotron :restaurant="restaurant" /> -->
    <div class="container-fluid px-md-5">
      <!-- <Loader v-if="isLoading" /> -->
      <div>
        <div v-if="!isCheckout" class="container-fluid">
          <div class="row w-100">
            <div
              class="
                col-8 col-lg-9 col-xl-10
                d-flex
                justify-content-around
                flex-wrap
              "
            >
            
              <div
                class="
                  card
                  col-10 col-md-5 col-xl-3
                  mx-xl-1
                  mb-5
                  d-flex
                  flex-wrap
                  justify-content-around
                "
                v-for="(dish, index) in dishes"
                :key="dish.id + index"
              >
              <!-- {{console.log(dish)}} -->
                <div
                  class="pro-pic"
                  v-bind:style="{
                    'background-image': 'url(' + imgURL + dish.path_img + ')',
                  }"
                ></div>
                <div class="description-wrap mw-100 text-center">
                  <div class="description text-white">
                    <h5 class="plate-name">{{ dish.name }}</h5>
                    <p class="plate-description">{{ dish.description }}</p>
                    <div
                      class="
                        plate-quantity-menu
                        d-flex
                        align-items-center
                        justify-content-around
                        flex-wrap
                      "
                    >
                      <!-- <a
                        class="
                          btn btn-danger
                          quantity-btn quantity-btn-negative
                        "
                        v-if="dish.quantity && shoppingCart.length > 0"
                        @click="removePlateToCart(dish, index)"
                      > -->
                        -
                      <!-- </a>
                      <span v-else class="px-4 px-lg-3 replacer">.</span>
                      <p
                        class="plate-quantity"
                        v-if="shoppingCart.length === 0"
                      > -->
                        0
                      <!-- </p>
                      <p v-else class="plate-quantity">{{ dish.quantity }}</p>
                      <a
                        class="
                          btn btn-success
                          quantity-btn quantity-btn-positive
                        "
                        @click="addPlateToCart(dish)"
                        >+</a
                      > -->
                    </div>
                    <p class="plate-price">{{ dish.price }} €</p>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="
                col-6 col-md-3
                d-flex
                flex-column
                align-items-center
                cart-column
              "
            >
              <div
                class="text-center cart-modal-container cart-fixer fixed-top"
              >
                <div
                  class="
                    col-6 col-md-3
                    d-flex
                    flex-column
                    align-items-center
                    cart-column
                  "
                >
                  <div
                    class="
                      text-center
                      cart-modal-container cart-fixer
                      fixed-top
                    "
                  >
                    <div class="mw-100">
                      <!-- <ModalCart
                        :shoppingCart="shoppingCart"
                        :totalPrice="totalPrice"
                      /> -->
                      <div class="d-flex justify-content-between">
                        <a
                          class="btn btn-success mt-3 mr-1"
                          @click="showCheckoutComp"
                        >
                          Checkout
                        </a>
                        <button
                          class="btn btn-danger mt-3"
                          @click="clearLocalStorage"
                        >
                          Svuota
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div>
          <!-- <Checkout
            v-if="isCheckout"
            :shoppingCart="shoppingCart"
            :totalPrice="totalPrice"
            :restaurant="restaurant"
          /> -->
        </div>
      </div>
    </div>
  </div>
</template>
<script>
// import ModalCart from "./ModalCart.vue";
// import Checkout from "./Checkout.vue";
// import Loader from "./Loader.vue";
// import HeaderRestaurant from "./HeaderRestaurant.vue";
// import Jambotron from "./Jambotron.vue";
export default {
  name: "RestaurantDetail",
  components: {
    // ModalCart,
    // Checkout,
    // Loader,
    // HeaderRestaurant,
    // Jambotron,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8000/api",
      restaurant: [],
      prevRestaurant: [],
      dishes: [],
      shoppingCart: [],
      // showModal: false,
      isCheckout: false,
      isLoading: false,
      totalPrice: 0,
      imgURL: "../storage/",
    };
  },
  methods: {
    getRestaurantAndPlatesFromApi() {
      this.isLoading = true;
      axios
        .get('/api/restaurants/' + this.$route.params.slug)
        .then((res) => {
          this.restaurant = res.data.restaurant;
          console.log(this.restaurant);
          this.dishes = res.data.dishes;
        //   if (this.prevRestaurant.id !== this.restaurant.id) {
        //     this.clearLocalStorage();
        //   }
        // })
        // .catch((err) => {
        //   console.error(err);
        // })
        // .then(() => {
        //   this.isLoading = false;
        // 
        });
    },
    addPlateToCart(dish) {
      if (!this.shoppingCart.includes(dish)) {
        this.shoppingCart.push(dish);
        dish.quantity = 1;
        this.totalPrice += dish.price;
      } else {
        dish.quantity++;
        this.totalPrice += dish.price;
      }
      // this.showModal = true;
      this.saveCartInLocalStorage();
    },
    removePlateToCart(dish) {
      if (this.shoppingCart.includes(dish) && dish.quantity > 0) {
        dish.quantity--;
        this.totalPrice = this.totalPrice - dish.price;
      } else if (dish.quantity == 0) {
        this.totalPrice = this.totalPrice - dish.price;
      }
    },
    // LOCAL STORAGE
    saveCartInLocalStorage() {
      this.prevRestaurant = this.restaurant;
      let serializedShoppingCart = JSON.stringify(this.shoppingCart);
      let serializedTotalPrice = JSON.stringify(this.totalPrice);
      let serializedRestaurant = JSON.stringify(this.prevRestaurant);
      localStorage.setItem("cart", serializedShoppingCart);
      localStorage.setItem("amount", serializedTotalPrice);
      localStorage.setItem("restaurant", serializedRestaurant);
    },
    clearLocalStorage() {
      this.shoppingCart = [];
      this.totalPrice = 0;
      localStorage.setItem("cart", JSON.stringify(this.shoppingCart));
      localStorage.setItem("amount", JSON.stringify(this.totalPrice));
    },
    showCheckoutComp() {
    //   if (this.shoppingCart.length > 0) {
    //     this.isCheckout = true;
    //   }
    },
  },
  created() {
    let url = window.location.href;
    url = new URL(url);
    let dinamicParam = url.pathname;
    this.getRestaurantAndPlatesFromApi(dinamicParam);
    this.prevRestaurant = JSON.parse(localStorage.getItem("restaurant"));
    if (this.shoppingCart !== null && this.totalPrice !== null) {
      this.shoppingCart = JSON.parse(localStorage.getItem("cart"));
      this.totalPrice = JSON.parse(localStorage.getItem("amount"));
      /*  if (this.shoppingCart.length > 0) {
        this.showModal = true;
      } */
    }
  },
};
</script>
<style lang="scss">
@import "../../sass/app.scss";
body {
  margin: 0 !important;
}
.card {
  margin-top: 100px;
  height: 500px;
  position: relative;
  background: #FF5858;
  transition: all 0.3s ease-out;
}
.card .description-wrap {
  padding: 105px 30px;
  position: relative;
  overflow: hidden;
}
.card .description {
  color: black;
  text-align: center;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  align-content: center;
  flex-wrap: wrap;
  font-size: 20px;
  line-height: 1.4;
  transition: all 0.5s ease-out;
  overflow-x: auto;
  transform: translateY(100%);
  opacity: 0;
}
.card .description > * {
  width: 100%;
}
.card .description h3 {
  margin: 0;
  font-size: 26px;
}
.card .description h4 {
  margin: 0;
}
.pro-pic {
  position: absolute;
  left: 50%;
  top: 0;
  width: 100%;
  height: 100%;
  transform: translatex(-50%);
  background-size: cover;
  background-position: center center;
  transition: all 0.5s ease-out;
}
.card:hover .pro-pic {
  transform: translate(-50%, -50%);
  width: 150px;
  height: 150px;
  border-radius: 50%;
  border: 3px solid;
}
.card:hover {
  border-radius: 50px;
}
.card:hover .description {
  transform: translateY(0%);
  opacity: 1;
}
.cart-modal-container {
  width: 100%;
}
.cart-column {
  max-width: 100%;
  position: relative;
  .cart-fixer {
    width: 200px;
    top: 230px;
    left: calc(100% - 320px);
  }
}
.plate-name {
  font-size: 20px;
  font-family: "Montserrat", sans-serif;
  font-weight: 900;
}
.plate-description {
  font-size: 13px;
  font-style: italic;
}
.plate-quantity {
  font-size: 60px;
}
.quantity-btn {
  font-size: 15px;
  border-radius: 50%;
}
.quantity-btn-positive {
  padding: 3px 12px;
}
.quantity-btn-negative {
  padding: 5px 15px;
}
.replacer {
  color: #FF5858;
}
@media screen and (max-width: 1199px) {
  .plate-description {
    display: none;
  }
}
@media screen and (max-width: 1340px) {
  .cart-column {
    .cart-fixer {
      left: calc(100% - 270px);
    }
  }
}
@media screen and (max-width: 700px) {
  .cart-column {
    .cart-fixer {
      left: calc(100% - 250px);
    }
  }
}
@media screen and (max-width: 600px) {
  .cart-column {
    .cart-fixer {
      left: calc(100% - 225px);
    }
  }
}
.plate-quantity-menu {
  display: flex;
  justify-content: space-around;
  align-content: center;
}
@media screen and (min-width: 768px) {
  .plate-quantity-menu {
    flex-direction: column;
    justify-content: center;
  }
  .plate-quantity,
  .plate-name {
    font-size: 25px;
  }
  .quantity-btn-positive,
  .quantity-btn-negative {
    margin: 10px 0;
    font-size: 20px;
  }
  .plate-description {
    font-size: 8px;
  }
  .quantity-btn-positive {
    padding: 1px 12px;
  }
  .quantity-btn-negative {
    padding: 3px 16px;
  }
}
@media screen and (min-width: 1200px) {
  .plate-quantity-menu {
    flex-direction: row;
    justify-content: space-around;
  }
  .plate-name {
    font-size: 25px;
  }
  .plate-quantity {
    font-size: 55px;
  }
  .quantity-btn {
    font-size: 15px;
  }
  .quantity-btn-positive {
    padding: 2px 11px;
  }
  .quantity-btn-negative {
    padding: 3px 14px;
  }
  .plate-description {
    font-size: 15px;
  }
}
</style>