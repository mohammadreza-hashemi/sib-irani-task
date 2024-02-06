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

Route::get('/', function () {

    $client = \Elastic\Elasticsearch\ClientBuilder::create()
        ->setHosts(['https://localhost:9200'])
        ->setBasicAuthentication(env('ELASTICSEARCH_USER'), env('ELASTICSEARCH_PASS'))
        ->setSSLVerification(false)
        ->build();

    $params = [
        'index' => 'index1',
        'body' => ['name' => 'hasan', 'age' => 22]
    ];
    $response = $client->index($params);
    dd($response);
});
