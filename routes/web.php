<?php

use Illuminate\Support\Facades\Route;
use App\Todo;

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

// Route::get('/', function () {
//     return view('todo');
// });


Route::get('/',function() {
    $todo = Todo::all();
    return view('todo')->with('todo',$todo);
});

// Route::get('todo','TodoController@index')->name('todo.index');
Route::get('todo/{todo}/edit','TodoController@edit')->name('todo.edit'); 
Route::delete('/delete_todo/{id}','TodoController@destroy'); 
// Route::get('/',"TodoController@index")->name('todo.index');
Route::post('/create','TodoController@create')->name('todo');
// Route::resource('todo','TodoController');
Route::put('/update_todo/{id}', 'TodoController@update');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
