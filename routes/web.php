<?php

use App\Http\Controllers\Backend\NotificationController;
use App\Http\Controllers\Backend\PublicationController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// HomePage Route
Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/image',[PublicationController::class, 'downloadImageFromUrl'])->name('downloadImageFromUrl');

//User Auth Route
Route::prefix('user')->name('user.')->group(function(){

    Route::get('/login',[UserController::class, 'UserLoginView'])->name('login');
    Route::post('/check',[UserController::class,'check'])->name('check');
    Route::get('/logout',[UserController::class,'logout'])->name('logout');

});
Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard/view', [UserController::class, 'UserDashboard'])->name('dashboard');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

 // Publications Routes
 Route::get('/publication/view/',[PublicationController::class, 'PublicationView'])->name('publication.view');
 Route::get('/publication/{id}/detail/view/',[PublicationController::class, 'PublicationDetail'])->name('publication.detail');
 Route::get('/publication/text/view/',[PublicationController::class, 'PublicationTextView'])->name('publication.text.view');
 Route::get('/publication/image/view/',[PublicationController::class, 'PublicationImageView'])->name('publication.image.view');
 Route::get('/publication/video/view/',[PublicationController::class, 'PublicationVideoView'])->name('publication.video.view');

 Route::get('/publication/{id}/image/add/',[PublicationController::class, 'PublicationImageAdd'])->name('publication.image.add');
 Route::get('/publication/{id}/video/add/',[PublicationController::class, 'PublicationVideoAdd'])->name('publication.video.add');
 Route::get('/publication/{id}/text/add/',[PublicationController::class, 'PublicationTextAdd'])->name('publication.text.add');

 Route::post('/publication/store', [PublicationController::class, 'PublicationStore'])->name('publication.store');
 Route::get('/publication/edit/{id}', [PublicationController::class, 'PublicationEdit'])->name('publication.edit');
 Route::post('/publication/update', [PublicationController::class, 'PublicationUpdate'])->name('publication.update');
 Route::get('/publication/delete/{id}', [PublicationController::class, 'PublicationDelete'])->name('publication.delete');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

 // Notifications Routes
 Route::get('/notification/view/',[NotificationController::class, 'NotificationView'])->name('notification.view');
 Route::post('/notification/accept/update/{id}',[NotificationController::class, 'NotificationAcceptUpdate'])->name('notification.accept');
  Route::post('/notification/decline/update/{id}',[NotificationController::class, 'NotificationDeclineUpdate'])->name('notification.decline');
});

// CkEditor Upload Image Route
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () { '\vendor\UniSharp\LaravelFilemanager\Lfm::routes()'; });
