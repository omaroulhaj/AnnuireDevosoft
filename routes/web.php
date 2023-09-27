<?php
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');
Route::get('/admin/home', function () {
  
        return redirect()->route('admin.home')->with('status', 'you are logged in');
    
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Categories
    Route::delete('categories/destroy', 'CategoriesController@massDestroy')->name('categories.massDestroy');
    Route::resource('categories', 'CategoriesController');

    // Boutiques
    Route::delete('boutiques/destroy', 'BoutiquesController@massDestroy')->name('boutiques.massDestroy');
    Route::post('boutiques/media', 'BoutiquesController@storeMedia')->name('boutiques.storeMedia');
    Route::post('boutiques/ckmedia', 'BoutiquesController@storeCKEditorImages')->name('boutiques.storeCKEditorImages');
    Route::resource('boutiques', 'BoutiquesController');

    // Villes
    Route::delete('villes/destroy', 'VillesController@massDestroy')->name('villes.massDestroy');
    Route::resource('villes', 'VillesController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
    
// HOME 
Route::get('/home',[AccueilController::class,'home']);
Route::get('home/details/{id}',[AccueilController::class,'voirplus']);
Route::post('/home/search',[AccueilController::class,'filtrage']);
Route::get('/home/search',[AccueilController::class,'filtrage1']);
Route::get('/home/search/telephone',[AccueilController::class,'phone']);
Route::get('/home/search/vetement',[AccueilController::class,'vetement']);