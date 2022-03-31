<template>
    <div class="not-found-wrapper">
        <div class="container">
            <div class="error_content">
                <div class="error_page text-center">
                    <!-- <h1 class="text-uppercase mb-5 text-white">Error 401</h1> -->
                    <div class="error-logo d-flex justify-content-center align-items-center">
                        <div class="number">
                            4
                        </div>

                        <div class="image">
                            <img src="../../assets/img/pizza.png" alt="Pizza Logo">
                        </div>

                        <div class="number">
                            4
                        </div>
                    </div>
                    <router-link class="nav-link text-decoration-none fs-3 text-white" :to="{name:'home'}">Torna alla <span class="return_home text-warning">HOMEPAGE</span></router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'NotFound',
}
</script>

<style lang="scss" scoped>

.not-found-wrapper {
    background-color: #000103;
    height: 100vh;
    .error_content{
        width:100%;
        padding-top:50px;
        // height: 500px;
        border: 1px solid #b22222;
        border-radius: 20px;
        background-color: #000103;
        background: linear-gradient(15deg, rgba(234,237,199,1) 0%, rgba(243,129,50,1) 25%, rgba(124,9,2,1) 100%);

        .error_page {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;

            .error-logo {
                    .number {
                        font-size: 300px;
                    }
                }
        }
        .return_home:hover{
                color:white;
                transform:scale(0.7);
            }
        }
}

</style>