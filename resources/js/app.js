/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('recipe-form', require('./components/recipes/RecipeForm.vue').default);
Vue.component('modal-confirm-delete', require('./components/global/ModalConfirmDelete.vue').default);
Vue.component('modal-item', require('./components/items/ModalItem.vue').default);
Vue.component('recipe-listing', require('./components/recipes/RecipeListing.vue').default);
Vue.component('shopping-list-form', require('./components/shopping_lists/ShoppingListForm.vue').default);
Vue.component('auto-complete', require('./components/global/AutoComplete.vue').default);
Vue.component('items-section', require('./components/shopping_lists/ItemsSection.vue').default);
Vue.component('recipes-section', require('./components/shopping_lists/RecipesSection.vue').default);
Vue.component('items-index', require('./components/items/ItemsIndex.vue').default);
Vue.component('aisles-index', require('./components/aisles/AislesIndex.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.Event =  new Vue(); // for global eventing

const app = new Vue({
    el: '#app',
    data: {
        modalConfirmDeleteOpen: false,
        modalItemOpen: false,
    },
});
