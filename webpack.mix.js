const mix = require('laravel-mix');
require("laravel-mix-svg-vue");
require("laravel-mix-bundle-analyzer");
const path = require("path");

require('fast-glob');

const config = require("./webpack.config"); 
mix.setPublicPath('./');
mix.webpackConfig(config);

// mix.browserSync("orely.test");
mix
  .sass('resources/sass/app.scss', 'dist/css')
  .sass('resources/sass/pages/homepage.scss', 'dist/css')
  .sass('resources/sass/pages/products.scss', 'dist/css')
  .sass('resources/sass/pages/single-products-css.scss', 'dist/css')
  .options({
    processCssUrls: false,
    postCss: [
        require("postcss-import"),
        require("tailwindcss/nesting"),
        require("tailwindcss"),
        require("autoprefixer"),
    ],
  });

  mix.js("resources/js/products.js", "dist/js/pages")
  mix.js("resources/js/single-products-js.js", "dist/js/pages")
  .vue({ version: 3});

    mix.js("resources/js/app.js", "dist/js")

mix.autoload({
    jquery: ['$', 'window.jQuery']
});

mix.sourceMaps().version();
mix.disableSuccessNotifications();

if (!mix.inProduction()) {
    mix.bundleAnalyzer();
}

mix.webpackConfig({
  stats: {
      children: true,
  },
});

mix.options({
    legacyNodePolyfills: true
});