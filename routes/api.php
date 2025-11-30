<?php

use App\Http\Controllers\Api\PharmacyController;
use App\Http\Controllers\Api\PublicationController;
use App\Http\Controllers\Api\SocialMediaController;

use App\Models\PushSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('publication')->group(function () {
    Route::get('/list/{user_id}', [PublicationController::class, 'PublicationList']);
    Route::post('/store', [PublicationController::class, 'PublicationStore']);
    Route::get('/item/{id}', [PublicationController::class, 'PublicationItem']);
    Route::post('/media/update/{id}', [PublicationController::class, 'PublicationMediaUpdate']);
    Route::post('/item/update/{id}', [PublicationController::class, 'PublicationUpdate']);
    Route::delete('/delete/{id}', [PublicationController::class, 'PublicationDelete']);
});

Route::prefix('media')->group(function () {
    Route::get('/user/info/{userId}', [SocialMediaController::class, 'GetUserInfo']);
    Route::get('/all/posts/{userId}', [SocialMediaController::class, 'GetAllPosts']);
    Route::get('/all/comments/{userId}', [SocialMediaController::class, 'GetAllComments']);
    Route::delete('/delete/{id}', [SocialMediaController::class, 'CommentPostDelete']);
    Route::post('/comment/update/{id}', [PublicationController::class, 'CommentUpdate']);
});

Route::prefix('facebook')->group(function () {
    Route::get('/store/post/{userId}', [SocialMediaController::class, 'facebookMediaPostStore']);

    Route::get('/all/comments/{userId}', [SocialMediaController::class, 'facebookGetAllComments']);
    Route::get('/store/comment/{userId}', [SocialMediaController::class, 'facebookMediaCommentStore']);
    Route::post('/comment/update/{id}', [PublicationController::class, 'facebookCommentUpdate']);
    Route::delete('/delete/{id}', [SocialMediaController::class, 'facebookCommentPostDelete']);
});

Route::prefix('instagram')->group(function () {
    Route::get('/store/post/{userId}', [SocialMediaController::class, 'instagramMediaPostStore']);

    Route::get('/all/comments/{userId}', [SocialMediaController::class, 'instagramGetAllComments']);
    Route::get('/store/comment/{userId}', [SocialMediaController::class, 'instagramMediaCommentStore']);
    Route::post('/comment/update/{id}', [PublicationController::class, 'instagramCommentUpdate']);
    Route::delete('/delete/{id}', [SocialMediaController::class, 'instagramCommentPostDelete']);
});



Route::prefix('pharmacy')->group(function () {
    Route::get('/list/detail', [PharmacyController::class, 'getPharmaciesDetails']);
    Route::post('/store/item', [PharmacyController::class, 'PharmacyStore']);
    Route::get('/item/{id}', [PharmacyController::class, 'PharmacyItem']);
    Route::delete('/delete/{id}', [PharmacyController::class, 'PharmacyDelete']);
});
