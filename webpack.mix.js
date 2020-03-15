let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');
require('laravel-mix-purgecss');
// const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

mix
    .webpackConfig({
        // plugins: [ new BundleAnalyzerPlugin({'analyzerMode': 'static'}) ],
        resolve: {
            modules: [
                path.resolve(__dirname, 'resources/js'),
                path.resolve(__dirname, 'resources/js/components'),
                'node_modules'
            ]
        }
    })
    .extract()
    .js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    })
    .purgeCss({
        extensions: ['html', 'js', 'css', 'php', 'vue'],
        whitelist: ['arrow', 'tooltip', 'tooltip-inner', 'tooltip-arrow', 'x-placement', 'StripeElement'] // For v-popover functionality: 'popover', 'popover-inner', 'popover-arrow'
    });

// Disable production check for now - build is done locally, not on the production server
// if (mix.inProduction()) {
mix.version();
// }
