import Vue from 'vue';
window._ = require("lodash");

require('@/utils/flash.js');
Vue.component('FileInput', () => import('@/components/FileInput'));
Vue.component('editor', () => import('@/components/editor'));

const app = new Vue({
    el: '#app',
});
