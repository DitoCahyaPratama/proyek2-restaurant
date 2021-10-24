<template>
    <nav class="mb-10 list-none">        
        <li v-for="(cuisine, index) in cuisines" :key="index" >
            <a :href="`/cuisine/${cuisine.id}`" class="text-sm text-gray-400 hover:text-gray-500 cursor-pointer ">
                {{cuisine.name}}
            </a>
        </li>
    </nav>
</template>
<script>
    export default {
        data() {
            return {
                cuisines:[]
            }
        },
        created() {
            axios
            .get(`/api/getRandomCuisines`)
            .then(response => response.data )
            .then(async response => { 
                this.cuisines=response.cuisines;
            })
            .catch((err) => {console.log(err);})
        }
    }
</script>
