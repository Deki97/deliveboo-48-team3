<template>
    <div>{{dd('ciao')}}</div>
</template>

<script>

export default {
    name:'Categories',
    components:{},
    data:function(){
        return {
            category:{},
        }
    },
    methods:{
        getCategories(){

             axios.get('/api/categories')
            .then((response) => {
                //  if(response.data.success) {
                    this.category = response.data.results;
                    console.log(this.category);
                    
                // } else {
                //     this.$router.push({ name: 'not-found' });
                // }
            });
       
        }
    },
    // end MEthods
    created:function() {
        this.getCategories();
    },
}
</script>