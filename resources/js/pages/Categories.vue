<template>
    <div>
        <div v-for="category in categories" :key="category.id" >{category.name}</div>
    </div>
</template>

<script>
export default {
    name:'Categories',
    data:function(){
        return {
            categories:[],

            
        };
    },
    methods:{
        getCategories:function(){
            axios.get('/api/categories')
            .then((response) => {
                
                    this.categories = response.data.results;
                    // console.log(this.categories);
                
                // else{
                //     // this.$router.push({name:'not-found'});
                // }
            })
        },
        
    },
    created:function(){
        this.getCategories();
    },
}
</script>

