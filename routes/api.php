<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Categories
    Route::apiResource('categories', 'CategoriesApiController');

    // Boutiques
    Route::post('boutiques/media', 'BoutiquesApiController@storeMedia')->name('boutiques.storeMedia');
    Route::apiResource('boutiques', 'BoutiquesApiController');

    // Villes
    Route::apiResource('villes', 'VillesApiController');
});
