<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::any('/operation', function (Request $request) {
  $query = $request->input('query');
  try{
    if(strpos($query, 'insert')!== false){
      $op=DB::insert($query);
      return "registro insertado correctamente";
    }else if(strpos($query, 'delete')!== false){
      $op =DB::delete($query);
      return "registro eliminado correctamente";
    }else if(strpos($query, 'update')!== false){
      $op=DB::update($query);
      return "registro actualizado correctamente";
    } else{
      return "operacion no admitida";
    }
  } catch(Exception $e){
    return $e->errorInfo[2];
  }

});
