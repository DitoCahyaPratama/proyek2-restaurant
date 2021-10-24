<template>
    <nav class="mb-10 list-none">        
        <li v-for="(categorie, index) in categories" :key="index" >
            <a :href="`/category/${categorie.id}`" class="text-sm text-gray-400 hover:text-gray-500 cursor-pointer ">
                {{categorie.name}}
            </a>
        </li>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                categories:[]
            }
        },
        created() {
            axios
                .get(`/api/getRandomCategories`)
                .then(response => response.data )
                .then(async response => { 
                    this.categories=response.categories;
                })
                .catch((err) => {console.log(err);})
        }
    }
</script>
