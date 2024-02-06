<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
 * this is movie crud  routes with microservice and repository design pattern
 */
Route::resource('movies', \App\Http\Controllers\MovieController::class);
/*
 * this route insert movies to elasticsearch database
 */
Route::get('elastic/store', [\App\Http\Controllers\ElasticSearchController::class, 'store']);
/*
* this route search in elastic database after redis cache checking
*/
Route::get('elastic/search/{keyword}', [\App\Http\Controllers\ElasticSearchController::class, 'search']);
