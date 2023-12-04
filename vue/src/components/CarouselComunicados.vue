<script setup>
import { ref } from 'vue'
import axios from 'axios'

import '../assets/css/carousel.css';

const itensPorSlide = ref(9)

const slides = ref([]);

axios
    .get('http://localhost/wp-json/wp/v2/pages?slug=home&acf_format=standard')
    .then(response => {
        const dadosACF = response.data[0].acf;
        for (const comunicado of Object.keys(dadosACF)) {
            if (dadosACF[comunicado].ativado) {
                slides.value.push(dadosACF[comunicado]);
            }
        }
    });
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
        <Carousel :items-to-show="1" :i18n="{
            'ariaNextSlide': 'Próximo comunicado',
            'ariaPreviousSlide': 'Comunicado anterior',
            'ariaNavigateToSlide': 'Pular para o comunicado {slideNumber}',
            'ariaGallery': 'Galeria',
            'itemXofY': 'Comunicado {currentSlide} de {slidesCount}',
            'iconArrowUp': 'Seta para cima',
            'iconArrowDown': 'Seta para baixo',
            'iconArrowRight': 'Seta para a direita',
            'iconArrowLeft': 'Seta para a esquerda',
        }">
            <template #slides>
                <Slide v-for="slide, index in slides" :key="slide">
                    <a :href="slide.href" class="slide-container" :aria-label="slide.alt_text">
                        <div class="carousel__item" :style="`background: url(${slide.background.url})`">
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
