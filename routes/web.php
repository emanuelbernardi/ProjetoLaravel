<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::resource('users', UserController::class);

Route::get("/", [SiteController::class,"index"])->name("site.index");
Route::get("/produtos/{id}", [SiteController::class, "details"])->name("site.details");
Route::get("/categoria/{id}", [SiteController::class, "categoria"])->name("site.categoria");
Route::get("/carrinho", [CarrinhoController::class, "carrinhoLista"])->name("site.carrinho");
Route::post("/carrinho", [CarrinhoController::class, "adicionaCarrinho"])->name("site.addcarrinho");
Route::post("/remove", [CarrinhoController::class, "removeCarrinho"])->name("site.removecarrinho");
Route::post("/atualizar", [CarrinhoController::class, "atualizaCarrinho"])->name("site.atualizacarrinho");
Route::get("/limpar", [CarrinhoController::class, "limparCarrinho"])->name("site.limparcarrinho");

Route::view('/login', 'login.form')->name('login.form');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

Route::get('/register', [LoginController::class, 'create'])->name('login.create');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
