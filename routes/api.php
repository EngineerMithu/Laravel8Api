<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|----------------------------------------------------------------------------
| Product API
|----------------------------------------------------------------------------
*/
// get api for fetch product
 Route::get('/product/{id?}',[ProductController::class,'index']);
// post api for add product
 Route::post('/product/store',[ProductController::class,'store']);
// put api for update product
 Route::put('/product/update/{id?}',[ProductController::class,'update']); 
// delete api for delect product
Route::delete('/product/delete/{id}',[ProductController::class,'delete']); 



//  <?php
// Route::apiResourse('/class','Api\ClassController');





































// Route::prefix('product')->group(function () {
//     Route::get('/product', [ProductController::class, 'index']);
//     Route::apiResource('/product', Api\ProductController::class);
// });


// Route::prefix('admin')->group(function () {
//     Route::get('/admin/panel', [PanelController::class, 'index']);
//     Route::resource('articles', ArticleController::class);
// });
