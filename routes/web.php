<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
Route::get('/jobs/create',[JobController::class,'createJob'])->middleware('auth');
//store jobs
Route::post('/jobs',[JobController::class,'addJob'])->middleware('auth');
//edit job page
Route::get('/jobs/{job}/edit',[JobController::class,'editJob'])->middleware('auth');
//update job page
Route::put('/jobs/{job}',[JobController::class,'updateJob'])->middleware('auth');
//delete job page
Route::delete('/jobs/{job}',[JobController::class,'deleteJob'])->middleware('auth');
//manage job page
Route::get('/jobs/manage',[JobController::class,'manageJob'])->middleware('auth');
// single jobs
Route::get('/jobs/{job}', [JobController::class,'singleJob']);



// register form
Route::get('/register',[AuthController::class,'register'])->middleware('guest');
//login form
Route::get('/login',[AuthController::class,'loginPage'])->name('login')->middleware('guest');
//login auth user
Route::post('/users/login',[AuthController::class,'loginUser']);
// create user
Route::post('/users/register',[AuthController::class,'createUser']);

// logout
Route::post('/logout',[AuthController::class,'logout'])->middleware('auth');



// admin page lists
Route:: get('/admin',[AdminController::class,'showIndex'])->middleware(['auth', 'admin']);



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