<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Models\Feedback;
use App\Models\Places;
use App\Models\sections;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FeedbackController::class, 'Home_Page']);
Route::resource('feedback', FeedbackController::class);
Route::get('workspaces', [AdminController::class, 'viewWorkspaces']);
Route::get('guest/get/details/section/{id}', [SectionsController::class, 'getDetailsGuest']);

Route::middleware(['auth:sanctum', 'verified'])->get('/Dashboard', function () {
    $user = Auth::user();
    $places = Places::withCount('sections')->where('users_id', $user->id)->orderBy('id', 'ASC')->get();
    $Data = User::where('id', '!=', Auth::id())->orderBy('id', 'desc')->get();
    $CompanyActive = User::where('Status', 'نشط');
    $Companies = User::where('id', '!=', Auth::id());
    $Feedback = Feedback::all();
    $SectionsActive = sections::where('status', 'نشط')->where('users_id', $user->id)->orderBy('id', 'desc');
    $SectionsNotActive = sections::where('status', 'غير نشط')->where('users_id', $user->id)->orderBy('id', 'desc');
    return view('dashboard', compact('places', 'Data', 'CompanyActive', 'user', 'Feedback', 'SectionsActive', 'SectionsNotActive', 'Companies'));
})->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    Route::middleware(['permission:ادارة المستخدمين'])->group(function () {
        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);
        Route::get('delete/user/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::middleware(['permission:الاقسام'])->group(function () {
        Route::resource('sections', SectionsController::class);
        Route::get('user/sections', [SectionsController::class, 'indexUser']);
        Route::get('add/sections/{id}', [SectionsController::class, 'create']);
        Route::post('store/sections/{id}', [SectionsController::class, 'store']);
        Route::get('delete/sections/{id}', [SectionsController::class, 'destroy'])->name('sections.destroy');
        Route::get('edit/sections/{id}', [SectionsController::class, 'edit']);
        Route::put('update/sections/{id}', [SectionsController::class, 'update']);
        Route::get('user/get/details/section/{id}', [SectionsController::class, 'getDetails']);
    });

    Route::middleware(['permission:الاماكن للمستخدم'])->group(function () {
        Route::resource('places', PlacesController::class);
        Route::get('user/places', [PlacesController::class, 'indexUser']);
        Route::get('add/places', [PlacesController::class, 'create']);
        Route::get('get/details/places/{id}', [PlacesController::class, 'getDetails']);
        Route::get('delete/places/{id}', [PlacesController::class, 'destroy'])->name('places.destroy');
        Route::get('edit/places/{id}', [PlacesController::class, 'edit'])->name('places.edit');
        Route::post('update/places/{id}', [PlacesController::class, 'update']);
    });

    Route::middleware(['permission:الشركات'])->group(function () {
        Route::resource('companies', CompaniesController::class);
        Route::resource('company', CompaniesController::class);
        Route::get('get/details/company/places/{id}', [CompaniesController::class, 'getPlaces']);
        Route::get('get/details/company/sections/{id}', [CompaniesController::class, 'getSections']);
        Route::get('get/details/section/{id}', [CompaniesController::class, 'getDetails']);
        Route::get('get/details/user/{id}', [AdminController::class, 'getDetails']);
        Route::get('edit/companies/{id}', [CompaniesController::class, 'edit']);
        Route::post('update/company/{id}', [CompaniesController::class, 'update']);
    });

    Route::middleware(['permission:الخدمات للمستخدم'])->group(function () {
        Route::resource('services', ServicesController::class);
        Route::get('user/services', [ServicesController::class, 'indexUser']);
        Route::get('add/services', [ServicesController::class, 'create']);
        Route::post('store/services/{id}', [ServicesController::class, 'store']);
        Route::get('edit/services/{id}', [ServicesController::class, 'edit']);
        Route::post('update/services/{id}', [ServicesController::class, 'update']);
        Route::get('delete/services/{id}', [ServicesController::class, 'destroy']);
    });

    Route::middleware(['permission:الملاحظات'])->group(function () {
        Route::get('admin/feedback', [FeedbackController::class, 'index']);
        Route::get('get/details/feedback/{id}', [FeedbackController::class, 'getDetails']);
        Route::get('delete/feedback/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
    });

    Route::get('profile', [AdminController::class]);
    Route::get('change/profile/information', [AdminController::class, 'edit']);
    Route::put('update/profile/{id}', [AdminController::class, 'update']);
    Route::get('/{page}', [AdminController::class, 'index']);

});
