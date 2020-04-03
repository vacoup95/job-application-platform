import $ from 'jquery';
require('./bootstrap');
window.$ = window.jQuery = $;

var Packery = require('isotope-packery');
var Isotope = require('isotope-layout');

if(jQuery('.grid').length) {
    var iso = new Isotope('.grid', {
        itemSelector: '.grid-item',
        layoutMode: "packery",
        packery: {}
    });
}

document.onclick = function(e) {
    if(e.target.dataset['href'] || e.target.parentNode.dataset['href'])
    {
        window.location.href = e.target.dataset['href'] || e.target.parentNode.dataset['href'];
    }
};
