<?php

use App\Http\Controllers\OrganizationController;
use App\Models\Organization;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('organizations', [OrganizationController::class, 'listOrganization'])->name('organizations');
Route::post('post-organizations', [CustomerController::class, 'createOrganization'])->name('organizations.post');
Route::post('update-organizations', [CustomerController::class, 'updateOrganization'])->name('organizations.update');
Route::get('delete-organizations{id}', [CustomerController::class, 'deleteOrganization'])->name('organizations.delete');