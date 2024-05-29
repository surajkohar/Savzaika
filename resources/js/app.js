import "./bootstrap";
import "../css/app.css";
import "@protonemedia/laravel-splade/dist/style.css";

import { createApp } from "vue/dist/vue.esm-bundler.js";
import { renderSpladeApp, SpladePlugin } from "@protonemedia/laravel-splade";
import Sidebar from "./components/Sidebar.vue";
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel';

const el = document.getElementById("app");

createApp({
    render: renderSpladeApp({ el }),
})
    .use(SpladePlugin, {
        max_keep_alive: 10,
        transform_anchors: false,
        progress_bar: true,
    })
    .component("sidebar", Sidebar)
    .component('Carousel', Carousel)      
    .component('CarouselSlide', Slide)    
    .component('CarouselPagination', Pagination)      
    .component('CarouselNavigation', Navigation) 
    .mount(el);
