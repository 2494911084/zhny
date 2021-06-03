/*
 * @Author: zhujianan
 * @Date: 2021-05-08 08:30:56
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-08 08:41:57
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\webpack.mix.js
 */
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.js('resources/js/app.js', 'public/js')
 .vue()
 .sass('resources/sass/app.scss', 'public/css')
 .version();
