<?php

use App\Http\Controllers\Web\CatController;
use App\Http\Controllers\Web\ExamController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\LangController;
use App\Http\Controllers\Web\SkillController;
use Illuminate\Support\Facades\Route;

Route::middleware('setlang')->group(function(){
    Route::get('/', [HomeController::class,'index']);
    Route::get('/categories/show/{id}',[CatController::class,'show']);
    Route::get('/skills/show/{id}',[SkillController::class,'show']);
    Route::get('/exams/show/{id}',[ExamController::class,'show']);
    Route::get('/exams/questions/{id}',[ExamController::class,'questions']);
});
// Route::get('/langtest', function () {
//     return app()->getLocale();  // should return 'en' or session 'lang'
// })->middleware('lang');


// Route::get('/', [HomeController::class,'index']);
// Route::get('/categories/show/{id}',[CatController::class,'show']);
// Route::get('/skills/show/{id}',[SkillController::class,'show']);
// Route::get('/exams/show/{id}',[ExamController::class,'show']);
// Route::get('/exams/questions/{id}',[ExamController::class,'questions']);
Route::get('/lang/set/{lang}',[LangController::class,'set']);
