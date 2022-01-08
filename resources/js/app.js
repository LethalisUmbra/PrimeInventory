/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

$(document).ready(function(){

    var items = document.getElementsByClassName('prime-item');

    for(i=0; i < items.length; i++)
    {
        items[i].onload = getWikiUrl(items[i].id);
    }
});

function getWikiUrl(item_id)
{
    $.getJSON('https://api.warframestat.us/items/search/' + item_id, function(data){
        itemData = data[0];
        // In case that a weapon has a dual variation, needs to be added here.
        if(item_id == 'Lex%20Prime' || item_id == 'Vasto%20Prime' || item_id == 'Bronco%20Prime')
        {
            itemData = data[1];
        }
        var item = document.getElementById(item_id);
        item.setAttribute("onclick","window.open('"+itemData.wikiaUrl+"', '_blank')");
    });
}