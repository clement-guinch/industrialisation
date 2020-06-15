<?php

//     AUTH
Route::redirect('/admin', '/admin/home');

Auth::routes();

Route::get('/', 'ActualityController@actuality');
Route::get('/connexion', 'HomeController@index')->name('connexion');
Route::get('/album', 'PageController@album')->name('album');
Route::get('/comment', 'CommentController@comment')->name('comment');
Route::get('/presentation', 'PresentationController@presentation')->name('presentation');

Route::post('/sendFile', 'PresentationController@sendFile')->name('sendFile');

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Delete Account Routes
Route::get('delete_account', 'Auth\DeleteAccountController@showDeleteAccountForm')->name('auth.delete_account');
Route::patch('delete_account', 'Auth\DeleteAccountController@deleteUser')->name('auth.delete_account');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    //home
    Route::get('/home', 'HomeController@index')->name('home');
    //permissions
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy',
        'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    //roles
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    //posts
    Route::resource('posts', 'Admin\PostsController');
    Route::post('posts_mass_destroy', 'Admin\PostsController@massDestroy')->name('posts.mass_destroy');
    //albums
    Route::resource('albums', 'Admin\AlbumsController');
    Route::post('album_mass_destroy', 'Admin\AlbumsController@massDestroy')->name('albums.mass_destroy');
    //comments
    Route::resource('comments', 'Admin\CommentsController');
    Route::post('comments_mass_destroy', 'Admin\CommentsController@massDestroy')->name('comments.mass_destroy');
    //categories
    Route::resource('categories', 'Admin\CategoriesController');
    Route::post('categories_mass_destroy', 'Admin\CategoriesController@massDestroy')->name('categories.mass_destroy');
    //users
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    //images
    Route::resource('images', 'Admin\ImageController');
});

