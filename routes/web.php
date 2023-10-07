<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SkemaController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FasilitasController;

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

// Authentication
Route::get("login", [AuthController::class, "login"])->name("login");
Route::get("register", [AuthController::class, "register"])->name("register");
Route::get("changePassword", [AuthController::class, "changePassword"])->name("changePassword");
Route::post("login", [AuthController::class, "loginProcess"])->name("login.process");
Route::post("register", [AuthController::class, "registerProcess"])->name("register.process");
Route::post("changePassword", [AuthController::class, "changePasswordProcess"])->name("changePassword.process");
Route::get("logout", [AuthController::class, "logout"])->name("logout");

Route::get('/', function () {
    return view('welcome');
});
Route::get("dashboard", DashboardController::class)->name("dashboard")->middleware(["auth"]);

Route::resource("user", UserController::class)->middleware(["auth"]);
Route::resource("role", RoleController::class)->middleware(["auth"]);
Route::resource("tipe", TipeController::class)->middleware(["auth"]);
Route::resource("skema", SkemaController::class)->middleware(["auth"]);
Route::resource("area", AreaController::class)->middleware(["auth"]);
Route::resource("wilayah", WilayahController::class)->middleware(["auth"]);
Route::resource("pemilik", PemilikController::class)->middleware(["auth"]);
Route::resource("fasilitas", FasilitasController::class)->middleware(["auth"]);
