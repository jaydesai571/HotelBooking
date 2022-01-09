<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\ClientController;
use App\HTTP\Controllers\ContentsController;
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

Route::get('/', [ContentsController::class, 'home']);
Route::get('/clients', [ClientController::class, 'index']);
Route::get('/clients/new', [ClientController::class, 'newClient']);
Route::post('/clients/new', [ClientController::class, 'create']);
Route::get('/clients/{client_id}', [ClientController::class, 'show']);
Route::post('/clients/{client_id}', [ClientController::class, 'modify']);

Route::get('/reservation/{client_id}', [RoomsController::class, 'checkAvailableRooms']);
Route::post('/reservation/{client_id}', [RoomsController::class, 'checkAvailableRooms']);

Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', [ReservationsController::class, 'bookRoom']);

Route::get('/about', function () {
//    return '<h3>About</h3>';
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';
    return $response_arr;
});

Route::get('/home', function () {
    $data = [];
    $data['version'] = '0.1.1';
    return view('welcome',$data);
});

Route::get('/di', [ClientController::class, 'di']);
 