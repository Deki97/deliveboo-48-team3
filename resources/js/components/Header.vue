<template>
    <header class="d-flex align-items-center">
            <nav class="navbar navbar-expand-lg align-items-center justify-content-between">
                <div class="menus d-flex justify-content-between">
                    <div class="header-logo">
                        <a class="navbar-brand mx-3" href="#">Deliveboo</a>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        <li class="nav-item active mx-3">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Chi siamo</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Lavora con noi</a>
                        </li>
                        <li class="nav-item mx-3">
                            <a class="nav-link" href="#">Contattaci</a>
                        </li>
                        </ul>
                    </div>

                    <div class="buttons">
                        <button type="button" class="btn btn-warning">Accedi</button>
                        <button type="button" class="btn btn-warning">Registrati</button>
                    </div>
                </div>

                <Slide class="d-block d-lg-none burger-menu" right
                    :isOpen="this.open"
                    :closeOnNavigation="true"
                    noOverlay
                    width="250"
                >
                <!-- Home Burger Link -->
                <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-home"></i></span>Home</router-link>
                <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-user-friends"></i></span>Chi siamo</router-link>
                <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-briefcase"></i></span>Lavora con noi</router-link>
                <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fa-solid fa-phone"></i></span>Contattaci</router-link>
                </Slide>
                
            </nav>
            
    </header>
</template>

<script>
import { Slide } from 'vue-burger-menu';

export default {
    name: 'Header',
    components: {
        Slide
    },
    data() {
        return {
            open: false
        };
    },
    methods: {
        openMenu() {
            this.open = true;
        }
    }
}
</script>

<style lang="scss">
@import '../../sass/app.scss';

header {
    background-color: $page_primary_color;
    color: black;
    padding: 20px 0;
    font-size: 20px;
    text-transform: uppercase;
    width: 100%;
    
    nav {
        width: 100%;
        .bm-burger-button {
        position: fixed;
        width: 40px;
        height: 25px;
        left: 36px;
        top: 36px;
        cursor: pointer;
        color: white;
        
        }
        .navbar-collapse {
            flex-grow: 1;
        }

        .navbar-nav {
            .nav-item {
                .nav-link {
                    color: $page_secondary_color;
                    transition: 0.3s;

                    &:hover {
                        color: white;
                        transition: 0.3s;
                    }
                }
            }
        }

        .bm-burger-bars {
            background-color: $page_secondary_color;
        }

        .bm-menu {
            background-color: $page_tertiary_color;
            border: 5px $page_secondary_color;
        }

        .burger-link {
            color: $page_secondary_color;
            transition: 0.3s;
            text-transform: capitalize;

            &:hover {
                text-decoration: none;
                transform: translateX(5px);
                transition: 0.3s;
                color: white;
            }
        }

        .bm-item-list {
            margin-left: 1px;
        }

        .cross-style {
            position: absolute;
            top: 24px;
            left: 30px;
            cursor: pointer;
        }

        .bm-cross {
            background-color: $page_secondary_color;
            font-size: 40px;
        }

        .link-icon {
            margin-right: 20px;
        }
    }
}
</style>