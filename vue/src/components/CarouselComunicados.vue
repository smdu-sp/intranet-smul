<script setup>
import { ref } from 'vue'
import axios from 'axios'

import '../assets/css/carousel.css';

const itensPorSlide = ref(9)

const slides = ref([]);

axios
    .get('/wp-json/wp/v2/pages?slug=home&acf_format=standard')
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

.carousel-comunicados svg {
  filter: drop-shadow(3px 5px 2px rgb(0 0 0 / 0.3));
}

.carousel-comunicados svg path {
  fill: #cfd8eb;
}

.carousel-comunicados button:hover, .carousel-comunicados button:active, .carousel-comunicados button:focus {
    background-color: transparent;
}

.carousel__prev--disabled,
.carousel__next--disabled {
    cursor: default;
}

</style>

<template>
    <div class="container-carousel">
        <div class="carousel-comunicados">
            <Carousel :items-to-show="1" :wrap-around="false" :i18n="{
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
                        <template #next>
                        <InlineSvg
                            src="/wp-content/themes/generatepress/assets/img/comunicados-seta-direita.svg"
                        ></InlineSvg>
                    </template>
                    <template #prev>
                        <InlineSvg
                            src="/wp-content/themes/generatepress/assets/img/comunicados-seta-esquerda.svg"
                        ></InlineSvg>
                    </template>
                    </Navigation>
                </template>
            </Carousel>
        </div>
    </div>
</template>
