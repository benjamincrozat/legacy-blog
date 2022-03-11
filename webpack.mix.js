const mix = require('laravel-mix')

mix
    .disableSuccessNotifications()
    .postCss('resources/css/app.css', 'public/css', [
        require('tailwindcss')
    ])
    .js('resources/js/app.js', 'public/js')
    .version()
