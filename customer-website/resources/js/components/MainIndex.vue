<template>
  <section class="container py-5">
    <notifications position="bottom right" width="400px" group="foo" />
    <!-- Popular Restaurants -->
    <div class="flex flex-col py-4">
      <span class="w-40 h-1 bg-green"></span>
      <div class="flex items-center justify-between">
        <h2 class="text-black font-bold text-4xl pt-4 pb-2">
          {{ $t("Popular Restaurants") }}
        </h2>
        <a
          href="/restaurants"
          class="nav-link text-white align-middle text-center bg-green rounded-3xl py-2 px-4 leading-6"
        >
          {{ $t("View all") }}
        </a>
      </div>
      <p class="text-gray-400">
        {{ $t("Popular Restaurants Description") }}
      </p>
      <div
        class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 py-4"
      >
        <div
          v-for="(restaurant, index) in restaurants"
          :key="index"
          class="box h-72 mt-1 w-full"
        >
          <div
            @click="goToRestaurant(restaurant.restaurant.id)"
            class="h-2/3 w-full relative cursor-pointer"
          >
            <span
              class="absolute text-white rounded top-3 left-3 text-sm font-semibold py-1 px-2"
              style="background-color: #333"
            >
              {{ restaurant.cuisine }}
            </span>
            <span
              v-if="restaurant.restaurant.closed"
              class="absolute text-white rounded top-3 right-3 text-sm font-semibold py-1 px-2 bg-red-600"
            >
              closed
            </span>
            <img
              :src="
                restaurant.cover != ''
                  ? restaurant.cover
                  : '/images/restaurant-placeholder.png'
              "
              alt="restaurant"
              class="h-full w-full rounded"
            />
            <div
              class="absolute w-full overflow-hidden px-3 py-2.5 bottom-0 flex flex-col justify-center rounded-b-sm"
              style="background: rgba(92, 92, 92, 0.315)"
            >
              <h2 class="text-white text-xl font-semibold truncate">
                {{ restaurant.restaurant.name }}
              </h2>
              <p class="text-gray-100 text-xs">
                {{ restaurant.restaurant.address }}
              </p>
            </div>
          </div>
          <div class="px-1 py-3 flex flex-row justify-between text-sm w-full">
            <p
              v-html="restaurant.restaurant.description"
              class="text-gray-400 flex-1 h-24 overflow-hidden"
            ></p>
            <div class="w-5/12 flex flex-row justify-end">
              <div class="flex flex-col">
                <div class="text-gold flex-row flex justify-end items-center">
                  <div class="bg-gray-200 py-1 px-2 rounded">
                    <span class="text-gray-700 font-semibold">
                      {{ restaurant.rate }}
                    </span>
                    <i class="fas fa-star"></i>
                  </div>
                </div>
                <div
                  class="flex-row flex justify-end items-center mt-1"
                  :class="{
                    ['line-through text-gray-400']: !restaurant.restaurant
                      .available_for_delivery,
                    ['text-gray-600']:
                      restaurant.restaurant.available_for_delivery,
                  }"
                >
                  {{ $t("Delivery") }}
                  <i class="fas fa-motorcycle ml-1"></i>
                </div>
                <div
                  class="flex-row flex justify-end items-center mt-1"
                  :class="{
                    ['line-through text-gray-400']:
                      restaurant.restaurant.closed,
                    ['text-gray-600']: !restaurant.restaurant.closed,
                  }"
                >
                  {{ $t("Take away") }}
                  <i class="fas fa-shopping-basket ml-1"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="my-5 w-full h-60 md:h-96 relative rounded">
        <img
          src="/images/yami.jpg"
          alt="img"
          class="absolute top-0 left-0 w-full h-full object-cover rounded"
        />
        <div
          style="background: rgba(0, 0, 0, 0.593)"
          class="rounded w-full h-full absolute p-8 md:p-14 flex flex-col justify-center align-items-start"
        >
          <b class="text-white text-lg my-2">
            {{ $attrs.app_name }}
          </b>
          <h2 class="text-white text-xl md:text-5xl font-bold my-2">
            {{
              $t("More than", { number_restaurant: $attrs.countrestaurant - 1 })
            }}
          </h2>
          <p class="text-gray-200 text-sm mb-2 md:mb-4 w-1/2">
            {{ $t("index More than description") }}
          </p>
          <br class="hidden md:inline" />
          <a
            href="/restaurants"
            class="nav-link text-white align-middle text-center bg-green rounded-pill py-2 px-4 leading-8"
          >
            {{ $t("View all") }}
          </a>
        </div>
      </div>
    </div>
    <!-- Our Very Best Foods -->
    <div class="flex flex-col py-2">
      <span class="w-40 h-1 bg-green"></span>
      <div class="flex align-items-center justify-between">
        <h2 class="text-black font-bold text-4xl pt-4 pb-2">
          {{ $t("Our Very Best Foods") }}
        </h2>
        <a
          href="/foods"
          class="text-white nav-link align-middle text-center bg-green rounded-3xl py-2 px-4 leading-6"
        >
          {{ $t("View all") }}
        </a>
      </div>
      <p class="text-gray-400">
        {{ $t("Popular Foods Description") }}
      </p>
      <div class="grid gap-5 grid-cols-1 md:grid-cols-2 py-4">
        <div
          v-for="(food, index) in foods"
          :key="index"
          @click="goToFood(food.restaurant.id)"
          class="cursor-pointer box h-44 w-full flex"
        >
          <div class="h-full w-1/3">
            <img
              :src="
                food.cover != '' ? food.cover : '/images/food-placeholder.jpeg'
              "
              alt="food image"
              class="h-full w-full rounded-l-md object-cover"
            />
          </div>
          <div
            class="flex-1 relative flex flex-col justify-between bg-gray-50 rounded-r-md px-4 pt-4 pb-3"
          >
            <div class="flex w-full justify-between align-items-start">
              <div>
                <span class="text-gray-800">
                  {{ food.category.name }}
                </span>
                <h2 class="text-black text-2xl font-bold">
                  {{ food.food.name }}
                </h2>
                <p class="text-gray-400 text-sm">{{ food.restaurant.name }}</p>
                <p class="text-gray-400 text-xs">
                  {{ food.restaurant.address }}
                </p>
              </div>
              <div v-if="food.rate" class="bg-gray-200 py-1 px-2 rounded">
                <span class="text-gray-700 font-semibold">
                  {{ food.rate }}
                </span>
                <i class="text-gold fas fa-star"></i>
              </div>
            </div>
            <div class="flex w-full justify-between align-items-baseline">
              <div class="flex flex-row items-center">
                <div
                  v-html="food.price"
                  class="text-green text-base font-bold sm py-1 px-2"
                ></div>
                <span
                  v-if="food.discount"
                  class="bg-red-600 text-white rounded text-sm py-1 px-2"
                >
                  -{{ food.discount }} %
                </span>
              </div>

              <div class="text-sm">
                <span
                  class="px-1"
                  :class="{
                    ['line-through text-gray-400']: !food.restaurant
                      .available_for_delivery,
                    ['text-gray-600']: food.restaurant.available_for_delivery,
                    ['line-through text-gray-400']: food.restaurant.closed,
                    ['text-gray-600']: !food.restaurant.closed,
                  }"
                >
                  {{ $t("Delivery") }}
                  <i class="fas fa-motorcycle"></i>
                </span>
                <span
                  class="px-1"
                  :class="{
                    ['line-through text-gray-400']: food.restaurant.closed,
                    ['text-gray-600']: !food.restaurant.closed,
                  }"
                >
                  {{ $t("Take away") }}
                  <i class="fas fa-shopping-basket"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  props: {
    countRestaurant: Number,
    delivery: String,
  },
  data() {
    return {
      restaurants: [],
      foods: [],
    };
  },
  created() {
    this.getTopFourRestarant();
    this.getTopSixFood();
  },
  methods: {
    goToRestaurant(restaurant_id) {
      location.href = window.location.origin + "/restaurant/" + restaurant_id;
    },
    goToFood(restaurant_id) {
      location.href =
        window.location.origin + "/restaurant/" + restaurant_id + "#foods";
    },
    getTopFourRestarant() {
      axios
        .get(`/api/getTopRatedRestarant`)
        .then((response) => response.data)
        .then((response) => {
          response.restaurants.forEach((element) => {
            this.restaurants.push(element);
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getTopSixFood() {
      axios
        .get(`/api/getTopRatedFood`)
        .then((response) => response.data)
        .then((response) => {
          response.foods.forEach((element) => {
            this.foods.push(element);
          });
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>