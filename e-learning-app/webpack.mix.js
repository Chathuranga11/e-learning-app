const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js') // Default JavaScript compilation
   .css('resources/css/sidebars.css', 'public/css'); // Compile sidebars.css
