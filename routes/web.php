<?php
/*
 * @Author: zhujianan
 * @Date: 2021-05-09 06:42:03
 * @LastEditors: zhujianan
 * @LastEditTime: 2021-05-11 14:28:16
 * @Description: 请输入功能介绍
 * @FilePath: \laravel-admin\routes\web.php
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/admin', 301);

Route::get('videodj/{id}',[\App\Http\Controllers\VideosController::class, 'videodj']);
