<?php

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
// Blog externo
Route::get('/', 'BlogController@index')->name('blog');
// Mostrar post en blog
Route::get('/blog/{post}', 'PostsController@show')->name('blog.post');
Route::get('/categorias/{category}', 'CategoriesController@show')->name('category.show');
Route::get('/tags/{tag}', 'TagsController@show')->name('tags.show');

Auth::routes();
//Auth::routes(['register' => false]);



//Route::get('/admin/dashboard', function () {
//    return redirect('')
//});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    // dashboard
    Route::get('/', 'AdminController@index')->name('dashboard');

    Route::resource('posts', 'PostsController', ['as' => 'admin']);
    Route::resource('users', 'UsersController', ['as' => 'admin']);

    Route::put('users/{user}/roles', 'UsersRolesController@update')->name('admin.users.roles.update');
    Route::put('users/{user}/permissions', 'UsersPermissionsController@update')->name('admin.users.permissions.update');
    
    /* // lista de posts en administracion
    Route::get('posts', 'PostsController@index')->name('admin.posts.index');
    // estas rutas guardan solo el titulo del post con el modal junto con el url partiendo del titulo
    Route::get('posts/create', 'PostsController@create')->name('admin.posts.create');
    Route::post('posts', 'PostsController@store')->name('admin.posts.store');
    // en estas rutas se llenan los demas campos cuando se crea un post, y al editar
    Route::get('posts/{post}/edit', 'PostsController@edit')->name('admin.posts.edit');
    Route::put('posts/{post}', 'PostsController@update')->name('admin.posts.update');
    // mostrar post individual en administracion
    Route::get('posts/{post}', 'PostsController@show')->name('admin.posts.show');
    // eliminar publicacion
    Route::delete('posts/{post}/', 'PostsController@destroy')->name('admin.posts.destroy'); */
    
    // guarda fotos (no funciona)
    Route::post('posts/{post}/photos', 'PhotoController@store')->name('admin.posts.photos.store');
});





