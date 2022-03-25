<template>
    <section>
        <div class="container">
            <div class="slider_content my-5">
                <div class="">
                    <carousel class="">
                            <slide>
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                             <slide>
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                            <slide >
                                <div class="square">
                                    TEST
                                </div>
                            </slide>
                    </carousel>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

const buildSlideMarkup = (count) => {
	let slideMarkup = '';
  for (var i = 1; i <= count; i++) {
  	slideMarkup += '<slide><span class="label">' + i + '</span></slide>'
  }
  return slideMarkup;
};

import { Carousel, Slide } from 'vue-carousel';
export default {
    name:'CategorySlider',
    // components
    components:{
        Carousel,
        Slide  
    },
    
    
   
  
}
</script>

<style lang="scss" scoped>


    .square{
        width:200px;
        height: 200px;
        margin:0 auto;
        text-align: center;
        background-image: url(../../assets/img/ristorante.jpeg);
    }
</style>