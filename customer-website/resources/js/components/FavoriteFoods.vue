<template>
    <div class="w-full my-3 mx-0 grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-2 -mt-1 ">
        <notifications position="bottom right" width="400px" group="bar" />
        <div v-for="(food,index) in foods" :key="index" class="flex flex-col">                       
            <div @click="goToFood(food.restaurant.id)" class="cursor-pointer box lg:h-44 md:h-56 w-full flex" >
                <div class="h-full w-1/3">
                    <img :src='food.cover !=""? food.cover :"/images/food-placeholder.jpeg"' alt="food image" class="h-full w-full rounded-l-md object-cover">
                </div>
                <div class=" flex-1 relative flex flex-col justify-between bg-gray-50 rounded-r-md px-4 pt-4 pb-3">
                    <div class="flex w-full justify-between align-items-start">
                        <div>
                            <span class="text-gray-800 ">
                                {{food.category.name}}
                            </span>
                            <h2 class="text-black text-2xl font-bold ">
                                {{food.food.name}}
                            </h2>
                            <p class="text-gray-400 text-sm">{{food.restaurant.name}}</p>
                            <p class="text-gray-400 text-xs">{{food.restaurant.address}}</p>
                        </div>
                        <div v-if="food.rate !=null" class="bg-gray-200 py-1 px-2 rounded">
                            <span class="text-gray-700 font-semibold">
                                {{food.rate}}    
                            </span>
                            <i class="text-gold fas fa-star"></i>
                        </div>
                        <div v-if="food.rate ==null" class="bg-gray-200 py-1 px-2 w-20 rounded">
                            <span class="text-gray-700 text-xs">
                                  {{$t("not rated")}}  
                            </span>
                        </div>
                    </div>
                    <div class="flex w-full justify-between align-items-baseline">
                        <div class="flex flex-col sm:flex-row items-center">
                            <p class="text-green text-base font-bold sm py-1 px-2">
                                {{food.price}}$
                            </p>
                            <span v-if="food.discount" class="bg-red-600 text-white text-center rounded w-12 text-sm py-1 px-1 ">
                                -{{food.discount}}% 
                            </span>                                    
                        </div>                                
                        <div class="text-sm">
                            <span class="px-1"
                                :class="{ ['line-through text-gray-400']: !food.restaurant.available_for_delivery,['text-gray-600']:food.restaurant.available_for_delivery}">
                                {{$t("Delivery")}} 
                                <i class="fas fa-motorcycle"></i>
                            </span>
                            <span class="px-1"
                                :class="{ ['line-through text-gray-400']: food.restaurant.closed,['text-gray-600']:!food.restaurant.closed}">
                                {{$t("Take away")}}
                                <i class="fas fa-shopping-basket"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="px-1 py-2.5 flex flex-row justify-between text-sm w-full">
                <span @click="remove(food.food)" class="flex-1 text-red-500 cursor-pointer hover:text-black transition ease-in-out duration-300"> 
                    <i class="fas fa-trash  mr-1  "></i>
                    {{$t("Remove from favorites")}}
                </span>                            
            </div>
        </div>
        <div v-if="canLoadMore && (foods.length >= 8) " class="lg:col-span-2 mb-4 md:col-span-2 col-span-1 flex flex-row justify-center">
            <button @click="loadMore()" class="mb-2 py-2 px-6 border-none bg-green text-white font-semibold rounded">
                {{$t("Load more")}}  
            </button>
        </div>
        <div v-if="foods.length === 0" class="lg:col-span-2 mb-4 md:col-span-2 col-span-1 text-center font-semibold text-2xl text-black">
            {{$t("Empty favorites list")}}
        </div>
    </div>                
</template>

<script>
export default {
    data() {
        return {
            authId:null,
            skip:0,
            foods:[],
            canLoadMore:true,
        }
    },
    created() {
        this.authId=this.$attrs.idauth;
        this.getFavoriteFooods();
    },
    methods: {
        getFavoriteFooods(){
            axios
            .get(`/favorites/getFavoriteFooods/${this.skip}`)
            .then(response => response.data )
            .then(response => {            
                this.foods=response.favFoods;
                
            })
            .catch((err) => {this.errorNotify(err);})
        },
        loadMore(){
            this.skip=this.skip+1;
            axios
            .get(`/favorites/getFavoriteFooods/${this.skip}`)
            .then(response => response.data )
            .then(response => {   
                response.favFoods.forEach(food => {
                  this.foods.push(food)  
                });
                if(response.favFoods.length<1){
                    this.canLoadMore=false;
                    this.notify("no more foods to load");
                }
                
            })
            .catch((err) => {this.errorNotify(err);})
        },
        goToFood(restaurant_id){
            location.href=window.location.origin+'/restaurant/'+restaurant_id+'#foods';
        },
        notify(msg){
            this.$notify({
                group: 'bar',
                title: 'Important message',
                text: msg
            });
        },
        errorNotify(msg){
            this.$notify({
                group: 'bar',
                title: 'Important message',
                type: 'error',
                text: msg
            });
        },
        remove(food){
            if(this.authId === null){
                this.errorNotify('you need to make a sing in to your account ')
            }else{   
                if(confirm("are tou sure that you want to delete this food from your favorites liste ?")){
                    axios
                    .post(`/api/favorites/${food.id}/${this.authId}`)
                    .then(response => response.data )
                    .then(response => {            
                        if(response.status ==="warn"){
                            this.errorNotify(response.message);
                            var array=this.foods;
                            this.foods=[];
                            array.forEach(element => { 
                            if(food.id !== element.food.id){
                                this.foods.push(element);
                            }
                            });
                        }
                        if(response.status==="error"){
                            this.errorNotify(response.error);
                        }
                    })
                    .catch((err) => {this.errorNotify(err);})
                }
                
            }
        }
    }
}
</script>