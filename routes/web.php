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

Route::get('/', function () {
    return view('dokkastudios');
});

/*Route::get('/resume/Daniel', function () {
   
});*/

Route::get('/resume/{nameOrJson}', function ($nameOrJson) {
    $path = "";
    $resume = "";

    if($nameOrJson == 'Daniel') {
        $path = asset('/resume/resume.json');
        $resume = json_decode(file_get_contents($path), true); 
        return view('resume', compact('resume'));
    }
    else if (isJson($nameOrJson)){
        return "si es";
    }

    return $nameOrJson; 
});

function isJson($string) {
	json_decode($string, true);
	return json_last_error() == JSON_ERROR_NONE;
}


Route::get('/resume', function () {
    $path = asset('/resume/resume.json');
    $json = json_decode(file_get_contents($path), true); 
    //$stringJson = file_get_contents($path);
    return $json;
});
