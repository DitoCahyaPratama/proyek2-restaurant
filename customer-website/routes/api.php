<?php
use Illuminate\Support\Facades\Route;

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

// get the top rated restarant
Route::get('/getTopRatedRestarant',[\App\Http\Controllers\api\RestaurantController::class, 'topRatedRestarant']);
// get the top rated foods
Route::get('/getTopRatedFood',[\App\Http\Controllers\api\FoodController::class, 'topRatedFood']);
// Route::post('/restarants/total',[\App\Http\Controllers\api\RestaurantController::class, 'total']);
Route::get('/restarants/{skip}',[\App\Http\Controllers\api\RestaurantController::class, 'index']);
// search for restarant
Route::post('/restarants/search',[\App\Http\Controllers\api\RestaurantController::class, 'search']);
// get the details of restaurant
Route::get('/restaurant/detail/{restaurant:id}',[\App\Http\Controllers\api\RestaurantController::class, 'show']);
// get the questions and the answers 
Route::get('/getFaqs',[\App\Http\Controllers\api\FaqController::class, 'indexFaq']);
// get the categorys of the questions 
Route::get('/getFaqsCategorys',[\App\Http\Controllers\api\FaqController::class, 'indexCategorys']);
// to put a food in user wishlist
Route::post('/favorites/{food_id}/{user_id}',[\App\Http\Controllers\api\FavoriteController::class, 'store']);
// get the number of restarants
Route::post('/restarants/total',[\App\Http\Controllers\api\RestaurantController::class, 'total']);
Route::post('/restarants/filter',[\App\Http\Controllers\api\RestaurantController::class, 'filter']);

Route::get('/getCuisines',[\App\Http\Controllers\api\CuisineController::class, 'index']);

Route::get('/getRandomCategories',[\App\Http\Controllers\api\CuisineController::class, 'randomCategories']);
Route::get('/getRandomCuisines',[\App\Http\Controllers\api\CuisineController::class, 'randomCuisines']);

Route::get('/getSlides',[\App\Http\Controllers\api\SlideController::class, 'getSlides']);

Route::get('/restaurant/gallerie/{restaurant:id}',[\App\Http\Controllers\api\GalleryController::class, 'getRestaurantGallerie']);

Route::get('/getDefaultCurrency', function () {return setting('default_currency');});
Route::get('/getCurrencyRight', function () {return setting('currency_right', false); });

