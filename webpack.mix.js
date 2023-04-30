const mix = require('laravel-mix');

mix.webpackConfig({
    resolve: {
        extensions: ['.js', '.vue', '.json'],
        alias: {
            'vue$': 'vue/dist/vue.esm.js',
            '@': __dirname + '/resources/js'
        },
    },
    output: {
        chunkFilename: 'dist/js/chunks/[name].js?id=[chunkhash]',
    }
});

mix.postCss('resources/css/tailwind.css', 'public/dist/css', [
    require("tailwindcss"),
]);

mix.js('resources/js/app.js', 'public/dist/js')
    .styles('resources/css/markdown.css', 'public/dist/css/markdown.css')
    .sass('resources/sass/app.scss', 'public/dist/css/app.css')
    .version();
