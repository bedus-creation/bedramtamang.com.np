const mix = require('laravel-mix');
var tailwindcss = require('tailwindcss');
let glob = require("glob-all");
let PurgecssPlugin = require("purgecss-webpack-plugin");

// Custom PurgeCSS extractor for Tailwind that allows special characters in
// class names.
//
// https://github.com/FullHuman/purgecss#extractor
class TailwindExtractor {
   static extract(content) {
      return content.match(/[A-Za-z0-9-_:\/]+/g) || [];
   }
}

mix.postCss('resources/css/tailwind.css', 'public/css', [
   tailwindcss('./tailwind.js'),
]);

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/laradash/laradash.scss', 'public/laradash/css');

// Only run PurgeCSS during production builds for faster development builds
// and so you still have the full set of utilities available during
// development.
if (mix.inProduction()) {
   mix.webpackConfig({
      plugins: [
         new PurgecssPlugin({
            // Specify the locations of any files you want to scan for class names.
            paths: glob.sync([
               path.join(__dirname, "resources/views/**/*.blade.php"),
               path.join(__dirname, "resources/js/**/*.vue")
            ]),
            extractors: [
               {
                  extractor: TailwindExtractor,

                  // Specify the file extensions to include when scanning for
                  // class names.
                  extensions: ["html", "js", "php", "vue"]
               }
            ]
         })
      ]
   });
}
