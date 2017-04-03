<?php

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
use App\news;

Route::get('/', function() {
	return view('welcome');
});

Route::get('/news', function () {
	//$news = DB::table('news')->get();
	$news = news::all();

	foreach ($news as $key => $value) {
		$news[$key]->content = trim(substr($news[$key]->content, 0, 400));
	}

    return view('news.index', compact('news'));
});

Route::get('/news/{id}', function ($id) {
	//$news = DB::table('news')->find($id);
	$news = news::find($id);
    
    return view('news.show', compact('news'));
});

Route::get('/news/edit/{id}', function ($id) {
	
	$news = news::find($id);

	return view('news.edit.index', compact('news'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');
