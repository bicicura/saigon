require('./bootstrap');

import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';

import Splide from '@splidejs/splide';
import { Intersection } from '@splidejs/splide-extension-intersection';
import { Video } from '@splidejs/splide-extension-video';

window.Splide = Splide;
window.Intersection = Intersection;
window.Video = Video;

window.Alpine = Alpine;

Alpine.plugin(persist);

Alpine.start();