/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');
require('bootstrap/dist/css/bootstrap.min.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
require('bootstrap/dist/js/bootstrap.bundle.min.js');

const feather = require('feather-icons/dist/feather.min.js')
feather.replace()
// console.log('Hello Webpack Encore! Edit me in assets/js/app.js');
// $(document).ready(function() {
//   $('body').prepend('<h1>hello jQuery!!!!!!!!!</h1>');
// });
//
// require('bootstrap/js/dist/popover');
// $(document).ready(function() {
//   $('[data-toggle="popover"]').popover();
// });
