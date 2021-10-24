<template>
    <div>
        <vueper-slides
            fixed-height="470px"
            ref="myVueperSlides"
            autoplay
            fade
            lazy
            @autoplay-pause="internalAutoPlaying = false"
            @autoplay-resume="internalAutoPlaying = true"
            :duration="2500"
            :bullets="false"
            :touchable="false"
            :pause-on-hover="true"
        >
            <template v-slot:arrow-left>
                <i class="icon icon-arrow-left"/>
            </template>
            <template v-slot:arrow-right>
                <i class="icon icon-arrow-right"/>
            </template>
            <vueper-slide
                v-for="(slide, index) in slides"
                :key="index"
                :content="slide.content"
                :image="slide.image"
            />
        </vueper-slides>
    </div>
</template>

<script>
export default {
    data() {
        return {
            internalAutoPlaying: true,
            slides: [],
        };
    },
    created() {
        axios
            .get(`/api/getSlides`)
            .then((response) => response.data)
            .then((response) => {
                response.forEach((slide) => {
                    this.slides.push({
                        id: slide.id,
                        image: slide.image,
                        content: `
                            <div class=" container px-2 flex flex-col items-center" >
                                <h2 class="text-base md:text-lg lg:text-5xl font-bold text-black py-3">
                                    ${slide.text}
                                </h2>
                                <form id="banner_search_input" class=" bg-white outline-none border-none h-14 p-2 rounded flex flex-row" action="/search" method="get">
                                  <input
                                      class="px-2 bg-white rounded flex-1 outline-none border-none "
                                      name="search"
                                      type="search"
                                      id="search"
                                      placeholder="${this.$t("Search for restaurants or foods")}"
                                      required
                                      autocomplete="off"
                                  >
                                  <button class="text-green bg-white" type="submit"> <i class="fas fa-search"></i></button>
                              </form>
                            </div>
                    `,
                    });
                });
            })
            .catch((err) => {
                console.log(err);
            });
    },
};
</script>
