<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\NewsController;
use App\Http\Controllers\Front\AssetController;
use App\Http\Controllers\Front\KajianController;
use App\Http\Controllers\Front\KeanggotaanController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\UstadzController;
use App\Http\Controllers\Front\OrtomController;
use App\Http\Controllers\Front\PengumumanController;
use App\Http\Controllers\Front\User\KajianController as UserKajianController;
use App\Http\Controllers\Front\User\ProfileController as UserProfileController;
use App\Http\Controllers\Front\User\DashboardController as UserDashboardController;

use App\Http\Controllers\Back\DashboardController as BackDashboardController;
use App\Http\Controllers\Back\UserController as BackUserController;
use App\Http\Controllers\Back\NewsController as BackNewsController;
use App\Http\Controllers\Back\PengumumanController as BackPengumumanController;
use App\Http\Controllers\Back\KajianController as BackKajianController;
use App\Http\Controllers\Back\GalleryController as BackGalleryController;
use App\Http\Controllers\Back\WelcomeSpeechController as BackWelcomeSpeechController;
use App\Http\Controllers\Back\AssetController as BackAssetController;
use App\Http\Controllers\Back\LetterController as BackLetterController;
use App\Http\Controllers\Back\inboxController as BackInboxController;
use App\Http\Controllers\Back\SettingController as BackSettingController;
use App\Http\Controllers\Back\ProfileController as BackProfileController;
use App\Http\Controllers\Back\OrtomController as BackOrtomController;
use App\Http\Controllers\Front\GalleryController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/visit', [HomeController::class, 'vistWebsite'])->name('visit.ajax');
Route::post('/message', [HomeController::class, 'message'])->name('message');
Route::Post('/subscribe', [HomeController::class, 'subscribe'])->name('subscribe');

Route::get('/welcome', [HomeController::class, 'welcomeSpeech'])->name('welcome.speech');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot.password');
Route::post('/forgot-password', [AuthController::class, 'forgotPasswordProcess'])->name('forgot.password.process');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('reset.password');
Route::post('/reset-password/{token}', [AuthController::class, 'resetPasswordProcess'])->name('reset.password.process');

Route::get('/pengumuman/{slug}', [PengumumanController::class, 'detail'])->name('pengumuman.detail');

Route::get('/profile/{slug}', [ProfileController::class, 'profile'])->name('profile');

Route::get('/news', [NewsController::class, 'news'])->name('news');
Route::get('/news/{slug}', [NewsController::class, 'detail'])->name('news.detail');
Route::post('/news/comment/{id}', [NewsController::class, 'comment'])->name('news.comment');
Route::get('/news/category/{slug}', [NewsController::class, 'category'])->name('news.category');

Route::get('/gallery/{slug}', [GalleryController::class, 'detail'])->name('gallery.detail');

Route::get('/kajian', [KajianController::class, 'kajian'])->name('kajian');
Route::get('/kajian/{slug}', [KajianController::class, 'detail'])->name('kajian.detail');
Route::post('/kajian/comment/{id}', [KajianController::class, 'comment'])->name('kajian.comment');

Route::get('/asset', [AssetController::class, 'asset'])->name('asset');

Route::get('/keanggotaan', [KeanggotaanController::class, 'index'])->name('keanggotaan');
Route::get('/keanggotaan/{id}', [KeanggotaanController::class, 'detail'])->name('keanggotaan.detail');

Route::get('/ortom/{slug}', [OrtomController::class, 'ortom'])->name('ortom');

Route::get('/ustadz', [UstadzController::class, 'search'])->name('ustadz.search');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::prefix('user')->middleware(['auth', 'role:user'])->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/kajian', [UserKajianController::class, 'kajian'])->name('kajian');
    Route::get('/kajian/create', [UserKajianController::class, 'kajianCreate'])->name('kajian.create');
    Route::post('/kajian/create', [UserKajianController::class, 'kajianStore'])->name('kajian.store');
    Route::get('/kajian/edit/{id}', [UserKajianController::class, 'kajianEdit'])->name('kajian.edit');
    Route::put('/kajian/edit/{id}', [UserKajianController::class, 'kajianUpdate'])->name('kajian.update');
    Route::delete('/kajian/delete/{id}', [UserKajianController::class, 'kajianDestroy'])->name('kajian.destroy');


    Route::get('/profile', [UserProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserProfileController::class, 'profileEdit'])->name('profile.edit');
    Route::put('/profile/edit', [UserProfileController::class, 'profileUpdate'])->name('profile.update');

});



Route::prefix('admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function () {
    Route::get('/dashboard', [BackDashboardController::class, 'index'])->name('dashboard');
    Route::get('/visitor-stat', [BackDashboardController::class, 'visistorStat'])->name('visitor.stat');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/news', [BackDashboardController::class, 'news'])->name('news');
        Route::get('/stat', [BackDashboardController::class, 'stat'])->name('news.stat');
    });

    Route::prefix('inbox')->name('inbox.')->group(function () {
        Route::get('/', [BackInboxController::class, 'index'])->name('index');
        Route::delete('/delete/{id}', [BackInboxController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [BackUserController::class, 'index'])->name('index');
        Route::get('/create', [BackUserController::class, 'create'])->name('create');
        Route::post('/create', [BackUserController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackUserController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackUserController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackUserController::class, 'destroy'])->name('destroy');

        Route::get('/export', [BackUserController::class, 'export'])->name('export');

        Route::get('/register', [BackUserController::class, 'register'])->name('register');
        Route::post('/register/approve/{id}', [BackUserController::class, 'registerApprove'])->name('register.approve');
    });

    Route::prefix('pengumuman')->name('pengumuman.')->group(function () {
        Route::get('/', [BackPengumumanController::class, 'index'])->name('index');
        Route::get('/create', [BackPengumumanController::class, 'create'])->name('create');
        Route::post('/create', [BackPengumumanController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackPengumumanController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackPengumumanController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackPengumumanController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('news')->name('news.')->group(function () {
        Route::get('/category', [BackNewsController::class, 'category'])->name('category');
        Route::post('/category', [BackNewsController::class, 'categoryStore'])->name('category.store');
        Route::put('/category/edit/{id}', [BackNewsController::class, 'categoryUpdate'])->name('category.update');
        Route::delete('/category/delete/{id}', [BackNewsController::class, 'categoryDestroy'])->name('category.destroy');

        Route::get('/', [BackNewsController::class, 'index'])->name('index');
        Route::get('/create', [BackNewsController::class, 'create'])->name('create');
        Route::post('/create', [BackNewsController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackNewsController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackNewsController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackNewsController::class, 'destroy'])->name('destroy');

        Route::get('/comment', [BackNewsController::class, 'comment'])->name('comment');
        Route::post('/comment/spam/{id}', [BackNewsController::class, 'commentSpam'])->name('comment.spam');
    });

    Route::prefix('kajian')->name('kajian.')->group(function () {
        Route::get('/', [BackKajianController::class, 'index'])->name('index');
        Route::get('/create', [BackKajianController::class, 'create'])->name('create');
        Route::post('/create', [BackKajianController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackKajianController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackKajianController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackKajianController::class, 'destroy'])->name('destroy');

        Route::get('/comment', [BackKajianController::class, 'comment'])->name('comment');
        Route::post('/comment/spam/{id}', [BackKajianController::class, 'commentSpam'])->name('comment.spam');
    });

    Route::prefix('gallery')->name('gallery.')->group(function () {
        Route::get('/album', [BackGalleryController::class, 'album'])->name('album');
        Route::post('/album', [BackGalleryController::class, 'albumStore'])->name('album.store');
        Route::put('/album/{id}', [BackGalleryController::class, 'albumUpdate'])->name('album.update');
        Route::delete('/album/{id}', [BackGalleryController::class, 'albumDestroy'])->name('album.destroy');

        Route::get('/', [BackGalleryController::class, 'index'])->name('index');
        Route::post('/create', [BackGalleryController::class, 'store'])->name('store');
        Route::put('/edit/{id}', [BackGalleryController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackGalleryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('welcomeSpeech')->name('welcomeSpeech.')->group(function () {
        Route::get('/', [BackWelcomeSpeechController::class, 'index'])->name('index');
        Route::put('/edit', [BackWelcomeSpeechController::class, 'update'])->name('update');
    });

    Route::prefix('asset')->name('asset.')->group(function () {
        Route::get('/type', [BackAssetController::class, 'type'])->name('type');
        Route::post('/type', [BackAssetController::class, 'typeStore'])->name('type.store');
        Route::put('/type/{id}', [BackAssetController::class, 'typeUpdate'])->name('type.update');
        Route::delete('/type/{id}', [BackAssetController::class, 'typeDestroy'])->name('type.destroy');

        Route::get('/type/{slug}', [BackAssetController::class, 'asset'])->name('index');
        Route::get('/create', [BackAssetController::class, 'assetCreate'])->name('create');
        Route::post('/create', [BackAssetController::class, 'assetStore'])->name('store');
        Route::get('/edit/{id}', [BackAssetController::class, 'assetEdit'])->name('edit');
        Route::put('/edit/{id}', [BackAssetController::class, 'assetUpdate'])->name('update');
        Route::delete('/delete/{id}', [BackAssetController::class, 'assetDestroy'])->name('destroy');

    });

    Route::prefix('letter')->name('letter.')->group(function () {
        Route::get('/in', [BackLetterController::class, 'letterIn'])->name('in');
        Route::get('/in/create', [BackLetterController::class, 'letterInCreate'])->name('in.create');
        Route::post('/in/create', [BackLetterController::class, 'letterInStore'])->name('in.store');
        Route::get('/in/edit/{id}', [BackLetterController::class, 'letterInEdit'])->name('in.edit');
        Route::put('/in/edit/{id}', [BackLetterController::class, 'letterInUpdate'])->name('in.update');
        Route::delete('/in/delete/{id}', [BackLetterController::class, 'letterInDelete'])->name('in.destroy');

        Route::get('/out', [BackLetterController::class, 'letterOut'])->name('out');
        Route::get('/out/create', [BackLetterController::class, 'letterOutCreate'])->name('out.create');
        Route::post('/out/create', [BackLetterController::class, 'letterOutStore'])->name('out.store');
        Route::get('/out/edit/{id}', [BackLetterController::class, 'letterOutEdit'])->name('out.edit');
        Route::put('/out/edit/{id}', [BackLetterController::class, 'letterOutUpdate'])->name('out.update');
        Route::delete('/out/delete/{id}', [BackLetterController::class, 'letterOutDelete'])->name('out.destroy');
    });

    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/website', [BackSettingController::class, 'website'])->name('website');
        Route::put('/website', [BackSettingController::class, 'websiteUpdate'])->name('website.update');
        Route::put('/website/info', [BackSettingController::class, 'informationUpdate'])->name('website.info');

        Route::get('/banner', [BackSettingController::class, 'banner'])->name('banner');
        Route::post('/banner', [BackSettingController::class, 'bannerCreate'])->name('banner.create');
        Route::put('/banner/{id}', [BackSettingController::class, 'bannerUpdate'])->name('banner.update');
        Route::get('/banner/{id}', [BackSettingController::class, 'bannerDestroy'])->name('banner.destroy');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [BackProfileController::class, 'index'])->name('index');
        Route::post('/create', [BackProfileController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackProfileController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackProfileController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackProfileController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('ortom')->name('ortom.')->group(function () {
        Route::get('/', [BackOrtomController::class, 'index'])->name('index');
        Route::post('/create', [BackOrtomController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [BackOrtomController::class, 'edit'])->name('edit');
        Route::put('/edit/{id}', [BackOrtomController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [BackOrtomController::class, 'destroy'])->name('destroy');
    });
});
