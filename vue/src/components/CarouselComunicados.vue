<script setup>
import { ref } from 'vue'
import axios from 'axios'

import '../assets/css/carousel.css';

const itensPorSlide = ref(9)
const slides = [{
    background: 'http://localhost/assets/comunicados-background-1.jpg',
    href: '/teste.html',
},
{
    background: '',
    href: '',
},
{
    background: '',
    href: '',
}]

</script>

<style>
.container-carousel {
    width: 100%;
    max-width: 880px;
    height: 330px;
}

.carousel,
.carousel__slide,
.slide-container,
.carousel__item {
    height: 330px;
    width: 100%;
    max-width: 880px;
}

.carousel__track {
    margin: 0;
}
</style>

<template>
    <div class="container-carousel">
        <Carousel :items-to-show="1">
            <template #slides>
                <Slide v-for="slide, index in slides" :key="slide">
                    <a :href="slide.href" class="slide-container">
                        <div class="carousel__item" :style="`background: url(${slide.background})`">
                            {{ index }}
                        </div>
                    </a>
                </Slide>
            </template>

            <template #addons>
                <Navigation>
                
                </Navigation>
                <Pagination />
            </template>
        </Carousel>
    </div>
</template>
