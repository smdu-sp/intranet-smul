import { createApp } from 'vue'
import './style.css'
import AppComunicados from './AppComunicados.vue'
import CarouselComunicados from './components/CarouselComunicados.vue'
import {
    Carousel,
    Navigation,
    Pagination,
    Slide
} from 'vue3-carousel'
import InlineSvg from 'vue-inline-svg'

const appComunicados = createApp(AppComunicados)
appComunicados.component('CarouselComunicados', CarouselComunicados)
appComunicados.component('Carousel', Carousel)
appComunicados.component('Navigation', Navigation)
appComunicados.component('Pagination', Pagination)
appComunicados.component('Slide', Slide)
appComunicados.component('InlineSvg', InlineSvg)

appComunicados.mount('#appComunicados')

