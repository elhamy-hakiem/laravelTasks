<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\blogsController;
use  App\Http\Controllers\admins\adminController;
use  App\Http\Controllers\admins\authAdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Route :: get('Blogs',[blogsController :: class , 'index']);
Route::get('Blogs/Create',[blogsController :: class , 'create']);
Route::post('Blogs/Store',[blogsController :: class , 'store']);


######################################################################
// Admin Routes
// STUDENT ROUTES . . .
Route :: get('Admins',[adminController :: class , 'index']);
Route :: get('Admins/Create',[adminController :: class , 'create']);
Route :: post('Admins/Store',[adminController :: class , 'store']);
Route :: get('Admins/edit/{id}',[adminController :: class , 'edit']);
Route :: put('Admins/update/{id}',[adminController :: class , 'update']);
Route :: get('Admins/Delete/{id}',[adminController :: class , 'remove']);

###############################################################################################################
// AUTH ROUTES . . .
Route :: get('Login',[authAdminController :: class , 'login']);
Route :: post('DOLogin',[authAdminController :: class , 'doLogin']);
Route :: get('Logout',[authAdminController :: class , 'Logout']);


###############################################################################################################

/*
get
post
put
patch
delete
resource
view
option
match
callback
*/
