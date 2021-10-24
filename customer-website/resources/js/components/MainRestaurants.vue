<template>
  <main class="w-full mt-16">
    <notifications position="bottom right" width="400px" group="foo" />
    <header class="py-3 w-full md:h-24 bg-gray-100">
      <div
        class="container flex flex-col md:flex-row md:justify-between items-center"
      >
        <div class="hidden md:block">
          <div class="text-black text-sm py-1">
            <a href="/" class="hover:text-gray-800 hover:no-underline">
              {{ $t("Home") }}
            </a>
            &nbsp; > &nbsp;
            <a
              href="/restaurants"
              class="text-green hover:text-green-400 hover:no-underline"
            >
              {{ $t("Restaurants") }}
            </a>
          </div>
          <p class="text-black font-medium text-lg py-1">
            {{ $t("Search for restaurants or foods") }}
          </p>
        </div>
        <div
          class="w-full h-12 md:w-2/5 md:h-4/6 bg-white flex flex-row rounded"
        >
          <input
            id="search"
            type="search"
            @keyup.enter="search()"
            @keyup.delete="searchKeyupDelete()"
            v-model="search_value"
            class="flex-1 bg-white outline-none p-3 rounded-l-sm"
            :placeholder="$t('Search for restaurants')"
            autocomplete="off"
          />
          <button
            @click="search()"
            class="w-14 bg-green rounded-r-sm text-white"
          >
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </header>
    <div id="map" class="w-full hidden" style="height: 74vh">
      <GmapMap
        :center="{ lat: myCoordinates.lat, lng: myCoordinates.lng }"
        :zoom="12"
        style="width: 100%; height: 100%"
      >
        <GmapMarker
          v-for="(m, index) in markers"
          :key="index"
          :position="m.position"
          :clickable="true"
          :draggable="false"
          :icon="{ url: '/images/map-marker.png' }"
          @click="toggleInfoWindow(m, index)"
        />
        <gmap-info-window
          :options="infoOptions"
          :position="infoWindowPos"
          :opened="infoWinOpen"
          @closeclick="infoWinOpen = false"
        >
          <div v-html="infoContent"></div>
        </gmap-info-window>
      </GmapMap>
    </div>
    <section class="container py-4 w-full flex flex-col lg:flex-row">
      <!-- desktop  -->
      <div
        class="w-3/12 md:mr-3 hidden lg:flex border-1 border-gray-300 border-dashed flex-col p-3"
        style="height: fit-content"
      >
        <!-- Open Map panel -->
        <div
          class="w-full h-36 relative rounded flex justify-center items-center"
        >
          <img
            src="/images/map.png"
            alt="map"
            class="absolute w-full h-full top-0 left-0 rounded"
          />
          <button
            id="open_map"
            class="relative h-1/3 w-3/5 rounded text-white"
            style="background-color: #333"
          >
            {{ $t("Open Map") }}
          </button>
        </div>
        <!-- filter panel -->
        <div class="mt-2 filter flex flex-col text-black">
          <ul
            class="list-none w-full flex flex-col mt-2 rounded border-gray-300"
          >
            <!-- Cuisines -->
            <li
              class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150"
            >
              <a
                onclick="this.classList.toggle('avtive')"
                class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
              >
                {{ $t("Cuisines") }}
                <i
                  class="fas fa-sort-amount-down-alt mt-2.5 down absolute right-5 text-xs duration-300"
                ></i>
              </a>
              <ul class="static flex-col py-1 container hidden">
                <li
                  v-for="(cuisine, index) in allCuisines"
                  :key="index"
                  class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 border-none"
                >
                  <label
                    class="input_checkbox relative block cursor-pointer select-none pl-8 ml-2 mb-2 text-base"
                    :for="cuisine.id"
                  >
                    {{ cuisine.name }}
                    <span class="text-xs"
                      >( {{ cuisine.restaurants_count }} )</span
                    >
                    <input
                      :name="cuisine.name"
                      :id="cuisine.id"
                      :value="cuisine.id"
                      v-model="filter.cuisine"
                      type="checkbox"
                      class="absolute opacity-0 cursor-pointer h-0 w-0"
                    />
                    <span
                      class="input_checkbox_checkmark rounded absolute top-0 left-0 h-5 w-5 bg-gray-300"
                    ></span>
                  </label>
                </li>
              </ul>
            </li>
            <!-- Price -->
            <li
              class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white"
            >
              <a
                onclick="this.classList.toggle('avtive')"
                class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
              >
                {{ $t("Price") }}
                <i
                  class="fas fa-sort-amount-down-alt mt-2.5 down absolute top-50 right-5 text-xs duration-300"
                ></i>
              </a>
              <ul class="static flex-col py-1 container hidden">
                <li
                  v-for="(price, index) in allPrices"
                  :key="index"
                  class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white border-none"
                >
                  <label
                    class="flex-1 mt-1 input_radio block relative pl-8 cursor-pointer text-base select-none"
                  >
                    {{ price.output }}
                    <input
                      :value="price.value"
                      v-model="filter.price"
                      type="radio"
                      name="price"
                      class="absolute cursor-pointer opacity-0"
                    />
                    <span
                      class="checkmark absolute left-1 w-5 h-5 rounded-full bg-gray-300"
                    ></span>
                  </label>
                </li>
              </ul>
            </li>
            <!-- Rating -->
            <li
              class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white"
            >
              <a
                onclick="this.classList.toggle('avtive')"
                class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
              >
                {{ $t("Rating") }}
                <i
                  class="fas fa-sort-amount-down-alt down mt-2.5 absolute top-50 right-5 text-xs duration-300"
                ></i>
              </a>
              <ul class="static flex-col py-1 container hidden">
                <li
                  v-for="i in 5"
                  :key="i"
                  class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white border-none"
                >
                  <label
                    class="flex-1 mt-1 input_radio block relative pl-8 cursor-pointer text-base select-none"
                  >
                    <i
                      v-for="j in i"
                      :key="j"
                      class="fas fa-star text-gold"
                    ></i>
                    <input
                      :value="i"
                      v-model="filter.rate"
                      type="radio"
                      name="rate"
                      class="absolute cursor-pointer opacity-0"
                    />
                    <span
                      class="checkmark absolute left-1 w-5 h-5 rounded-full bg-gray-300"
                    ></span>
                  </label>
                </li>
              </ul>
            </li>
          </ul>
          <button
            @click="filterRestarants()"
            class="my-3 w-full h-10 rounded border-none outline-none bg-green text-white"
          >
            {{ $t("Filter") }}
          </button>
        </div>
      </div>
      <!-- tablate & phone  -->
      <div
        class="w-full my-2 md:mr-3 flex lg:hidden py-2 border-1 border-gray-300 border-dashed flex-col px-4"
      >
        <div class="flex flex-row justify-between">
          <button
            id="open_map_phone"
            class="bg-green relative w-16 h-12 rounded text-white"
          >
            <i class="fas fa-map-marked"></i>
          </button>
          <button
            id="btn_phone_filter"
            class="bg-gray-200 relative w-16 h-12 rounded text-black"
          >
            <i class="fas fa-align-right"></i>
            {{ $t("Filter") }}
          </button>
        </div>
        <div id="phone_filter" class="w-full hidden">
          <div class="mt-2 filter flex flex-col text-black">
            <ul
              class="list-none w-full flex flex-col mt-2 border-1 rounded border-gray-400"
            >
              <!-- Cuisines -->
              <li
                class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150"
              >
                <a
                  onclick="this.classList.toggle('avtive')"
                  class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
                >
                  {{ $t("Cuisines") }}
                  <i
                    class="fas fa-sort-amount-down-alt mt-2.5 down absolute right-5 text-xs duration-300"
                  ></i>
                </a>
                <ul class="static flex-col py-1 container hidden">
                  <li
                    v-for="(cuisine, index) in allCuisines"
                    :key="index"
                    class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 border-none"
                  >
                    <label
                      class="input_checkbox relative block cursor-pointer select-none pl-8 ml-2 mb-2 text-base"
                      :for="cuisine.id"
                    >
                      {{ cuisine.name }}
                      <span class="text-xs"
                        >( {{ cuisine.restaurants_count }} )</span
                      >
                      <input
                        :name="cuisine.name"
                        :id="cuisine.id"
                        :value="cuisine.id"
                        v-model="filter.cuisine"
                        type="checkbox"
                        class="absolute opacity-0 cursor-pointer h-0 w-0"
                      />
                      <span
                        class="input_checkbox_checkmark rounded absolute top-0 left-0 h-5 w-5 bg-gray-300"
                      ></span>
                    </label>
                  </li>
                </ul>
              </li>
              <!-- Price -->
              <li
                class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white"
              >
                <a
                  onclick="this.classList.toggle('avtive')"
                  class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
                >
                  {{ $t("Price") }}
                  <i
                    class="fas fa-sort-amount-down-alt mt-2.5 down absolute top-50 right-5 text-xs duration-300"
                  ></i>
                </a>
                <ul class="static flex-col py-1 container hidden">
                  <li
                    v-for="(price, index) in allPrices"
                    :key="index"
                    class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white border-none"
                  >
                    <label
                      class="flex-1 mt-1 input_radio block relative pl-8 cursor-pointer text-base select-none"
                    >
                      {{ price.output }}
                      <input
                        :value="price.value"
                        v-model="filter.price"
                        type="radio"
                        name="price"
                        class="absolute cursor-pointer opacity-0"
                      />
                      <span
                        class="checkmark absolute left-1 w-5 h-5 rounded-full bg-gray-300"
                      ></span>
                    </label>
                  </li>
                </ul>
              </li>
              <!-- Rating -->
              <li
                class="w-full text-base border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white"
              >
                <a
                  onclick="this.classList.toggle('avtive')"
                  class="drop_down_btn nav-link relative block w-full text-lg pl-4 py-2 no-underline cursor-pointer text-black font-normal duration-200 ease-in-out"
                >
                  {{ $t("Rating") }}
                  <i
                    class="fas fa-sort-amount-down-alt down mt-2.5 absolute top-50 right-5 text-xs duration-300"
                  ></i>
                </a>
                <ul class="static flex-col py-1 container hidden">
                  <li
                    v-for="i in 5"
                    :key="i"
                    class="w-full text-base pl-4 mb-3 border-b-2 border-gray-200 transition ease-in-out duration-300 scale-150 hover:bg-white border-none"
                  >
                    <label
                      class="flex-1 mt-1 input_radio block relative pl-8 cursor-pointer text-base select-none"
                    >
                      <i
                        v-for="j in i"
                        :key="j"
                        class="fas fa-star text-gold"
                      ></i>
                      <input
                        :value="i"
                        v-model="filter.rate"
                        type="radio"
                        name="rate"
                        class="absolute cursor-pointer opacity-0"
                      />
                      <span
                        class="checkmark absolute left-1 w-5 h-5 rounded-full bg-gray-300"
                      ></span>
                    </label>
                  </li>
                </ul>
              </li>
            </ul>
            <button
              @click="filterRestarants()"
              class="my-3 w-full h-10 rounded border-none outline-none bg-green text-white"
            >
              {{ $t("Filter") }}
            </button>
          </div>
        </div>
      </div>
      <!-- gallery -->
      <div class="lg:w-9/12 ml-4 w-full mt-3">
        <div
          v-if="restaurants.length === 0"
          class="text-centerfont-bold text-3xl col-span-3 h-24 flex flex-row justify-center items-center"
        >
          <div class="">
            {{ $t("No restaurant is found") }}
          </div>
        </div>
        <div v-if="restaurants.length != 0">
          <!-- the boxes -->
          <div
            class="grid gap-5 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 -mt-1"
          >
            <div
              v-for="(restaurant, index) in restaurants"
              :key="index"
              class="box h-64 mt-1 w-full rounded"
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
              <div
                class="px-1 py-3 flex flex-row justify-between text-sm w-full"
              >
                <p
                  v-html="restaurant.restaurant.description"
                  class="text-gray-400 flex-1 h-20 overflow-hidden"
                ></p>
                <div class="w-5/12 flex flex-row justify-end">
                  <div class="flex flex-col">
                    <div
                      class="text-gold flex-row flex justify-end items-center"
                    >
                      <div class="bg-gray-200 py-1 px-2 rounded">
                        <span class="text-gray-700 font-semibold">{{
                          restaurant.rate
                        }}</span>
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
          <!-- pagination -->
          <div
            class="w-full flex flex-row justify-center items-center mt-8 text-black text-md"
          >
            <!-- perv link -->
            <a
              @click="perv()"
              :class="{
                'text-gray-300 hover:text-gray-300  ': skip <= 0,
                'hover:text-white hover:bg-gray-600': skip > 0,
              }"
              class="mx-1 cursor-pointer px-3 py-1 rounded"
            >
              <i class="fas fa-angle-double-left"></i>
            </a>
            <!-- page links -->
            <a
              v-for="(item, index) in skipingTab"
              :key="index"
              :class="{
                hidden: index > 4,
                'text-white  bg-gray-600': index === skip,
              }"
              @click="lode(item.skip)"
              class="nav-link cursor-pointer mx-1 px-3 py-1 rounded hover:text-white hover:bg-gray-600"
            >
              {{ item.page }}
            </a>
            <!-- ida 3adni kter men 6 page ndir affiche lele lakhra -->
            <div v-if="skipingTab.length > 6">
              <span class="mx-1">...</span>
              <a
                @click="lode(skipingTab[skipingTab.length - 1].skip)"
                class="nav-link mx-1 px-3 py-1 rounded hover:text-white hover:bg-gray-600"
                >{{ skipingTab[skipingTab.length - 1].page }}</a
              >
            </div>
            <!-- next link -->
            <a
              @click="next()"
              :class="{
                'text-gray-300 hover:text-gray-300 ':
                  (this.skip + 1) * 9 > this.totalRestaurants,
                'hover:text-white hover:bg-gray-600':
                  (this.skip + 1) * 9 < this.totalRestaurants,
              }"
              class="cursor-pointer mx-1 px-3 py-1 rounded"
            >
              <i class="fas fa-angle-double-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script>
export default {
  data() {
    return {
      // ta3e el filter
      allCuisines: [],
      allPrices: [],
      filter: {
        cuisine: [],
        rate: null,
        distance: null,
        price: null,
      },

      restaurants: [],
      search_value: null,
      // ta3e el pagination
      totalRestaurants: 0,
      skipingTab: [],
      skip: 0,
      // ta3e el map
      myCoordinates: { lat: 46.9126, lng: 7.0213 },
      markers: [],
      infoContent: "",
      infoWindowPos: { lat: 0, lng: 0 },
      infoWinOpen: false,
      infoOptions: { pixelOffset: { width: 0, height: -35 } },
    };
  },
  created() {
    this.getRstaurants();
    this.getUserLocation();
    this.getNumberOfRstaurants();
    this.getCuisines();

    this.allPrices = [
      {
        value: { min: 0, max: 10 },
        output: `${this.showPrice(0)} - ${this.showPrice(10)}`,
      },
      {
        value: { min: 10, max: 20 },
        output: `${this.showPrice(10)} - ${this.showPrice(20)}`,
      },
      {
        value: { min: 20, max: 50 },
        output: `${this.showPrice(20)} - ${this.showPrice(50)}`,
      },
      {
        value: { min: 50, max: 100 },
        output: `${this.showPrice(50)} - ${this.showPrice(100)}`,
      },
      {
        value: { min: 100, max: 100 * 100 },
        output: `+ ${this.showPrice(100)}`,
      },
    ];
  },
  methods: {
    // visite deatail page of restaurant
    goToRestaurant(restaurant_id) {
      location.href = window.location.origin + "/restaurant/" + restaurant_id;
    },
    getNumberOfRstaurants() {
      axios
        .post(`/api/restarants/total`)
        .then((response) => response.data)
        .then((response) => {
          this.totalRestaurants = response.total;
          for (
            let index = 0;
            index < Math.ceil(this.totalRestaurants / 9);
            index++
          ) {
            this.skipingTab.push({ page: index + 1, skip: index });
          }
        })
        .catch((err) => {
          this.errorNotify(err);
        });
    },
    // get all restaurants
    getRstaurants() {
      axios
        .get(`/api/restarants/${this.skip}`)
        .then((response) => response.data)
        .then((response) => {
          response.restaurants.forEach((element) => {
            this.restaurants.push(element);
            this.setMarker(element);
          });
        })
        .catch((err) => {
          this.errorNotify(err);
        });
    },
    // get all restaurants
    getCuisines() {
      axios
        .get(`/api/getCuisines`)
        .then((response) => response.data)
        .then((response) => {
          response.Cuisines.forEach((element) => {
            this.allCuisines.push({
              id: element.id,
              name: element.name,
              restaurants_count: element.restaurants_count,
            });
          });
        })
        .catch((err) => {
          this.errorNotify(err);
        });
    },
    // filter the list of restaurants
    filterRestarants() {
      fetch(`/api/restarants/filter`, {
        method: "post",
        headers: { "content-type": "application/json" },
        body: JSON.stringify(this.filter),
      })
        .then((res) => res.json())
        .then(async (res) => {
          this.restaurants = [];
          if (res.restaurants.length === 0) {
            this.getRstaurants();
          } else {
            res.restaurants.forEach((element) => {
              this.restaurants.push(element);
              this.setMarker(element);
            });
          }
        })
        .catch((err) => console.log(err));
    },
    // notify with error message
    errorNotify(msg) {
      this.$notify({
        group: "foo",
        title: "Important message",
        type: "error",
        text: msg,
      });
    },
    // after 3.5s remove the red border from the search filed
    clearBorder() {
      window.document.getElementById("search").classList.remove("border-2");
      window.document
        .getElementById("search")
        .classList.remove("border-red-400");
    },
    // serche for a restaurants
    search() {
      if (this.search_value == null) {
        window.document.getElementById("search").classList.add("border-2");
        window.document
          .getElementById("search")
          .classList.add("border-red-400");
        this.errorNotify(
          "The search filed is required and The search filed may not be greater than 50 characters."
        );
        setTimeout(this.clearBorder, 3600);
      } else {
        axios
          .post("/api/restarants/search", {
            search: this.search_value,
          })
          .then((response) => response.data)
          .then((response) => {
            this.restaurants = response.restaurants;
            this.markers = [];
            response.restaurants.forEach((element) => {
              this.setMarker(element);
            });
            if (this.markers.length != 0) {
              this.myCoordinates.lat = this.markers[0].position.lat;
              this.myCoordinates.lng = this.markers[0].position.lng;
            }
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
    searchKeyupDelete() {
      if (this.search_value === "") {
        this.restaurants = [];
        this.getRstaurants();
      }
    },

    // pagination
    lode(skip) {
      this.skip = skip;
      this.restaurants = [];
      this.getRstaurants();
    },
    perv() {
      if (this.skip - 1 > 0) {
        this.lode(this.skip - 1);
      }
    },
    next() {
      if ((this.skip + 1) * 9 < this.totalRestaurants) {
        this.lode(this.skip + 1);
      }
    },

    /*
            hadou les function ta3e el controle ta3e el map
        */

    // bah njib el location ta3e el user w nahtha hiya el center ta3e el mapo
    getUserLocation() {
      this.$getLocation()
        .then((coordinates) => {
          this.myCoordinates.lat = parseFloat(coordinates.lat);
          this.myCoordinates.lng = parseFloat(coordinates.lng);
        })
        .catch((err) => alert(err));
    },
    // nb3et element li houwa restaurant w ndirlu marker ki el map ta3i
    setMarker(element) {
      this.markers.push({
        name: element.restaurant.name,
        description: element.restaurant.description,
        cover:
          element.cover != ""
            ? element.cover
            : "/images/restaurant-placeholder.png",
        tel: element.restaurant.mobile,
        position: {
          lat: parseFloat(element.restaurant.latitude),
          lng: parseFloat(element.restaurant.longitude),
        },
      });
    },
    // ki nataka 3la marker yaftahli window fiha les info ta3e restaurant ta3e el marker
    toggleInfoWindow: function (marker, idx) {
      this.infoWindowPos = marker.position;
      this.infoContent = this.getInfoWindowContent(marker);
      //check if its the same marker that was selected if yes toggle
      if (this.currentMidx == idx) {
        this.infoWinOpen = !this.infoWinOpen;
      }
      //if different marker set infowindow to open and reset current marker index
      else {
        this.infoWinOpen = true;
        this.currentMidx = idx;
      }
    },
    // njib le contenue ta3e InfoWindow el khasa b larker m3ayen
    getInfoWindowContent: function (marker) {
      return `<div class="flex flex-col  p-2" style="width=400px" >
                        <img src=${marker.cover} class="w-full h-36 rounded" >
                        <h2 class="text-black py-0.5 text-base font-semibold ">${marker.name}</h2>
                        <span class="text-green text-base font-sm py-0.5"><i class="fas fa-phone mr-1"></i>${marker.tel}</span>
                        <a onclick='window.open("https://www.google.com/maps/dir//${marker.position.lat},${marker.position.lng}/@${marker.position.lat},${marker.position.lng},15z")'
                            class="cursor-pointer text-green hover:text-gray-900 min-w-min text-base font-medium py-1"
                        >
                            <i class="fas fa-route mr-1"></i>
                            Get directions
                        </a>
                </div>
            `;
    },

    showPrice(price = 0) {
      if (this.$attrs.currency_right != false) {
        return price.toFixed(2) + " " + this.$attrs.default_currency;
      }
      return this.$attrs.default_currency + " " + price.toFixed(2);
    },
  },
};
</script>