<?php

use App\Models\Region;
use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SomethingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/something',[SomethingController::class,'something']);
Route::get('/resultlist',[ResultController::class,'resultlist']);
Route::get('/student-counts', [ResultController::class, 'getStudentCounts']);

Route::get('/result', function (Request $request) {
     $payload = $request->search;
      $search = Str::upper($payload);
    return Result::where('roll_no', 'LIKE',"{$search}")->get();
});
Route::get('/region/{id}',[RegionController::class, 'show']);
Route::get('/region', [RegionController::class, 'index']);
Route::get('/township/{id}',[RegionController::class, 'town']);
Route::get('/township', [RegionController::class, 'township']);
Route::get('/chart', [ChartController::class, 'getData']);

Route::get('/students',function(){
    return Student::all();
});




