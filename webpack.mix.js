const mix = require('laravel-mix');
const glob = require('glob');
const path = require('path');
const ReplaceInFileWebpackPlugin = require('replace-in-file-webpack-plugin');
const rimraf = require('rimraf');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

if ( ! mix.inProduction()) {
    mix.webpackConfig({
        devtool: false
    })
}

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);

// 3rd party plugins css/js
mix.sass('resources/plugins/plugins.scss', 'public/_admin/plugins/global/plugins.bundle.css').then(() => {
    // remove unused preprocessed fonts folder
    rimraf(path.resolve('public/_admin/fonts'), () => {});
    rimraf(path.resolve('public/_admin/images'), () => {});
}).sourceMaps(!mix.inProduction())
    // .setResourceRoot('./')
    .options({processCssUrls: false}).js(['resources/plugins/plugins.js'], 'public/_admin/plugins/global/plugins.bundle.js');

// Metronic css/js
mix.sass('resources/metronic/sass/style.scss', 'public/_admin/css/style.bundle.css', {
    sassOptions: {includePaths: ['node_modules']},
})
    // .options({processCssUrls: false})
    .js('resources/js/scripts.js', 'public/_admin/js/scripts.bundle.js')
    .js('resources/js/config.js', 'public/_admin/js/config.bundle.js');

// Custom 3rd party plugins
(glob.sync('resources/plugins/custom/**/*.js') || []).forEach(file => {
    mix.js(file, `public/_admin/${file.replace('resources/', '').replace('.js', '.bundle.js')}`);
});
(glob.sync('resources/plugins/custom/**/*.scss') || []).forEach(file => {
    mix.sass(file, `public/_admin/${file.replace('resources/', '').replace('.scss', '.bundle.css')}`);
});

// Metronic css pages (single page use)
(glob.sync('resources/metronic/sass/pages/**/!(_)*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/metronic/sass', 'public/_admin/css').replace(/\.scss$/, '.css'));
});

// Metronic js pages (single page use)
(glob.sync('resources/metronic/js/pages/**/*.js') || []).forEach(file => {
    mix.js(file, `public/_admin/${file.replace('resources/metronic/', '')}`);
        // .sourceMaps(false, 'source-map');
});

// Metronic media
mix.copyDirectory('resources/metronic/media', 'public/_admin/media');

// Metronic theme
(glob.sync('resources/metronic/sass/themes/**/!(_)*.scss') || []).forEach(file => {
    file = file.replace(/[\\\/]+/g, '/');
    mix.sass(file, file.replace('resources/metronic/sass', 'public/_admin/css').replace(/\.scss$/, '.css'));
        // .sourceMaps(false, 'source-map');
});

mix.webpackConfig({
    plugins: [
        new ReplaceInFileWebpackPlugin([
            {
                // rewrite font paths
                dir: path.resolve('public/_admin/plugins/global'),
                test: /\.css$/,
                rules: [
                    {
                        // fontawesome
                        search: /url\((\.\.\/)?webfonts\/(fa-.*?)"?\)/g,
                        replace: 'url(./fonts/@fortawesome/$2)',
                    },
                    {
                        // flaticon
                        search: /url\(("?\.\/)?font\/(Flaticon\..*?)"?\)/g,
                        replace: 'url(./fonts/flaticon/$2)',
                    },
                    {
                        // flaticon2
                        search: /url\(("?\.\/)?font\/(Flaticon2\..*?)"?\)/g,
                        replace: 'url(./fonts/flaticon2/$2)',
                    },
                    {
                        // keenthemes fonts
                        search: /url\(("?\.\/)?(Ki\..*?)"?\)/g,
                        replace: 'url(./fonts/keenthemes-icons/$2)',
                    },
                    {
                        // lineawesome fonts
                        search: /url\(("?\.\.\/)?fonts\/(la-.*?)"?\)/g,
                        replace: 'url(./fonts/line-awesome/$2)',
                    },
                    {
                        // socicons
                        search: /url\(("?\.\.\/)?font\/(socicon\..*?)"?\)/g,
                        replace: 'url(./fonts/socicon/$2)',
                    },
                ],
            },
        ]),
    ],
});

// Webpack.mix does not copy fonts, manually copy
(glob.sync('resources/metronic/plugins/**/*.+(woff|woff2|eot|ttf)') || []).forEach(file => {
    var folder = file.match(/resources\/metronic\/plugins\/(.*?)\//)[1];
    mix.copy(file, `public/_admin/plugins/global/fonts/${folder}/${path.basename(file)}`);
});
(glob.sync('node_modules/+(@fortawesome|socicon|line-awesome)/**/*.+(woff|woff2|eot|ttf)') || []).forEach(file => {
    var folder = file.match(/node_modules\/(.*?)\//)[1];
    mix.copy(file, `public/_admin/plugins/global/fonts/${folder}/${path.basename(file)}`);
});
