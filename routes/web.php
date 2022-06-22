<?php
// Route::get('/register',[Register::class,'registerUserForm']);
// Route::post('/register',[Register::class,'registerUser'])->name('auths.store');
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Register;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Models\Auth;

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

// Route::get('/login', function (){
//     return view('login')->with([
//         'title'=>'login'
//     ]);
// });
// Route::get('/register', function (){
//     return view('register')->with([
//         'title'=>'register'
//     ]);
// });

Route::group(['middleware'=>'guest'],function (){
    Route::get('/login',[AuthController::class,'index'])->name('login');
    Route::post('/login',[AuthController::class,'login'])->name('login');

    Route::get('/register',[AuthController::class,'registerView'])->name('register');
    Route::post('/register',[AuthController::class,'register'])->name('register');
});




Route::group(['middleware'=>'auth'],function (){
    Route::get("/home",[AuthController::class,'home'])->name('home');
    Route::get('/myprofile',[UserController::class,'myprofile'])->name('myprofile');
    Route::get('/myprofile/updateProfile',[UserController::class,'updateProfileView'])->name('updateUser');
    Route::post('/myprofile/updateProfile',[UserController::class,'updateProfile'])->name('updateUser');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');
});
