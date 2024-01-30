<?php
use App\Models\User;
use App\Livewire\ChatWith;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;

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
    return view('frontend.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home')->middleware('auth');
Route::get('/homee/{userid}/{userid2}',[App\Http\Controllers\UserController::class, 'update'])->name('homee');
Route::get('/cancel/{userid}/{userid2}',[App\Http\Controllers\UserController::class, 'canelreq'])->name('cancel');
Route::get('/accpted/{userid}/{userid2}',[App\Http\Controllers\UserController::class, 'accept'])->name('accept');
// route::get('/profilee/{userid}',[App\Http\Controllers\HomeController::class,'add'])->name('profilee');
route::get('/profilee/{userid}',[App\Http\Controllers\HomeController::class,'add'])->name('profilee')->middleware('auth');
route::get('/friends/{userid}',[App\Http\Controllers\HomeController::class,'friends'])->name('friends')->middleware('auth');
route::post('/profile',[App\Http\Controllers\HomeController::class,'updateprofileImage'])->name('profileImage');
route::post('/profile-cover',[App\Http\Controllers\HomeController::class,'updatecoverImage'])->name('coverImage');


route::get('/messeges/{userid}',[App\Http\Controllers\HomeController::class,'chat'])->name('chat.index');

Route::get('/chat-with/{uuid}',[HomeController::class,'chat_uuid'])->name('chat_with');



route::get('/groups',[GroupController::class,'index'])->name('group.index');
route::get('/group-create/{userid}',[GroupController::class,'create'])->name('group.create');
route::post('/groups',[GroupController::class,'store'])->name('group.store');

route::get('/dashboard-group/{id}',[GroupController::class,'dashboard'])->name('group.dashboard');

Route::post('/groups/{group}/follow', [GroupController::class, 'follow'])->name('groups.follow');
    Route::post('/groups/{group}/unfollow', [GroupController::class, 'unfollow'])->name('groups.unfollow');

route::get('/logins' ,function () {
return view('frontend.login');

})->name('loginreg');
route::post('postcreate',[App\Http\Controllers\PostController::class,'store'])->name('postcreate');
route::post('postcreategroup',[App\Http\Controllers\PostController::class,'store2'])->name('postcreategroup');
route::post('commentcreate',[App\Http\Controllers\CommentController::class,'store'])->name('commentcreate');
route::get('addlike/{authid}/{postid}',[App\Http\Controllers\PostController::class,'addlike'])->name('addlike');
route::get('removelike/{authid}/{postid}',[App\Http\Controllers\PostController::class,'removelike'])->name('removelike');



