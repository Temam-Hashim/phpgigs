<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;

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

// all jobs
Route::get('/', [JobController::class,'allJobs']);
//create jobs
Route::get('/jobs/create',[JobController::class,'createJob']);
//store jobs
Route::post('/jobs',[JobController::class,'storeJob']);
// single jobs
Route::get('/jobs/{job}', [JobController::class,'singleJob']);



// register auth
Route::get('/register',[AuthController::class,'register']);
//login auth
Route::get('/login',[AuthController::class,'login']);



// Route::get('/posts', function () {
//     return response('post routes');
// });

// Route::get('/posts/{id}',function($id){
// // dd($id)
//     return response("post id:".$id);

// })->where('id','[0-9]+');

// Route::get('/search',function(Request $request){
//     return response("<h1>name:</h1>".$request->name."  <h1>mobile</h1>".$request->mobile);
// });
