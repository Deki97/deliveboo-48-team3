<template>
    <header>
        <nav class="navbar navbar-expand-lg align-items-center">
            <div class="menus d-flex align-items-center">
                <!-- Logo -->
                <div class="header-logo">
                    <img src="../../assets/img/fork-logo.png" alt="">
                </div>

                <!-- Desktop Menu -->
                <div class="collapse navbar-collapse align-items-center" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active mx-3">
                        <a class="nav-link" href="#">Home</a>
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

                <!-- Buttons Register/Login -->
                <div class="buttons d-none d-lg-block">
                    <button type="button" class="btn btn-warning">Accedi<span class="button-icon"><i class="fa-solid fa-right-to-bracket"></i></span></button>
                    <button type="button" class="btn btn-warning">Registrati<span class="button-icon"><i class="fa-solid fa-house"></i></span></button>
                </div>

                <!-- Burger Menu -->
                <div class="burger d-flex flex-column">
                    <Slide class="d-block d-lg-none burger-menu align-self-center" right
                    :isOpen="this.open"
                    :closeOnNavigation="true"
                    noOverlay
                    width="250"
                    >
                    <!-- Burger Links -->
                    <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-home"></i></span>Home</router-link>
                    <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-user-friends"></i></span>Chi siamo</router-link>
                    <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fas fa-briefcase"></i></span>Lavora</router-link>
                    <router-link class="burger-link" to="/" active-class="active-link"><span class="link-icon"><i class="fa-solid fa-phone"></i></span>Contattaci</router-link>

                    <div class="burger-buttons d-flex flex-column">
                        <!-- Burger Menu Buttons -->
                        <div class="single-burger-button">
                            <button type="button" class="btn btn-warning">Accedi<span class="button-icon"><i class="fa-solid fa-right-to-bracket"></i></span></button>
                        </div>

                        <div class="single-burger-button">
                            <button type="button" class="btn btn-warning">Registrati<span class="button-icon"><i class="fa-solid fa-house"></i></span></button>
                        </div>
                    </div>
                    </Slide>
                </div>
            </div>

            
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
    padding: 20px;
    font-size: 20px;
    text-transform: uppercase;
    width: 100%;
    border-bottom: 1px solid $page_secondary_color;
    
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

        .menus {
            width: 100%;

            .header-logo img {
                width: 60px;
            }
            .navbar-collapse {
                .navbar-nav {
                    flex-grow: 1;
                    justify-content: center;
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

            .burger-buttons {
                flex-grow: 1;
                justify-content: center;

                .single-burger-button {
                    margin: 5px 0;

                    .button-icon {
                        margin-left: 5px;
                    }
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
            }

            .link-icon {
                margin-right: 20px;
            }

            .buttons {
                button {
                    margin: 0 2px;
                    padding: 5px 15px;

                    .button-icon {
                        margin-left: 5px;
                    }
                }
            }
        }
    }
}
</style>