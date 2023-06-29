<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Group_UserController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\TodoController;

use App\Http\Middleware\IsAdminMiddleware;





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



// Route::get('/admin-page', function () {
//     return view('admin_dashboard');
// })->middleware('is_admin');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [GroupController::class, 'index'])->name('indexGroups');

Route::get('/group/create', [GroupController::class, 'create'])->name('createGroup');

Route::post('/group/store', [GroupController::class, 'store'])->name('storeGroup');

//change later to to-do index from group show
Route::get('/group/{group}/', [GroupController::class, 'show'])->name('showGroup');

Route::delete('/group/{groupId}', [GroupController::class, 'destroy'])->name('deleteGroup');

Route::get('/group/{group}/members', [Group_UserController::class, 'index'])->name('indexMembers');

Route::post('/invites/{invite}/store', [Group_UserController::class, 'store'])->name('storeMember');

Route::get('/group/{group}/delete', [GroupController::class, 'deleteScreen'])->name('deleteScreen');

Route::delete('/group/{groupId}/member/{userId}', [Group_UserController::class, 'destroy'])->name('deleteMember'); 

Route::get('/group/{group}/invite-users/create', [InviteController::class, 'create'])->name('createInvite');

Route::post('/group/{group}/invite-user', [InviteController::class, 'store'])->name('storeInvite');

Route::get('/invites', [InviteController::class, 'index'])->name('indexInvites');

Route::delete('/invite/{invite}', [InviteController::class, 'destroy'])->name('deleteInvite'); 

Route::get('/group/{group}/to-do/create', [TodoController::class, 'create'])->name('createTo-Do');

Route::post('/group/{group}/to-do/store', [TodoController::class, 'store'])->name('storeTo-Do');

Route::delete('/to-do/{todo}', [TodoController::class, 'destroy'])->name('deleteTo-Do');

Route::get('/to-do/{todo}/edit', [TodoController::class, 'edit'])->name('editTo-Do');

Route::post('/to-do/{todo}/update', [TodoController::class, 'update'])->name('updateTo-Do');

Route::post('/to-do/{todo}/check', [TodoController::class, 'check'])->name('checkTo-Do');

Route::post('/to-do/{todo}/uncheck', [TodoController::class, 'uncheck'])->name('uncheckTo-Do');

Route::get('/group/{group}/done-to-dos', [GroupController::class, 'indexDoneTodos'])->name('indexDoneTodos');






// Route::resource('/groups',[GroupController::class]);

// Route::resource('/group/{groupslug}/members', [Group_userController::class]);

// Route::resource('/group/{groupslug}/members/invites')







Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
