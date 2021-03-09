<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;

Route::prefix('{locale}')->group(function () {
    Route::get('categories' , [CategoriesController::class , 'main_categories']);
    Route::get('sub-categories-of/{id}' , [CategoriesController::class , 'sub_categories']);

});
