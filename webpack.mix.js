const mix = require('laravel-mix');

mix
    .disableNotifications()
    .js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ]);

// EasyMDE
mix
    .js('resources/js/vendor/easymde.js', 'public/js/vendor')
    .css('resources/css/vendor/easymde.css', 'public/css/vendor')

    // Tagify
mix
    .js('resources/js/vendor/tagify.js', 'public/js/vendor')
    .css('resources/css/vendor/tagify.css', 'public/css/vendor')


if (mix.inProduction()) {
    mix
        .version()
        .sourceMaps();
}