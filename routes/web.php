<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

// Route::resource("produtos", ProdutoController::class);

Route::get("/", [SiteController::class,"index"])->name("site.index");

Route::get("/produtos/{id}", [SiteController::class, "details"])->name("site.details");

Route::get("/categoria/{id}", [SiteController::class, "categoria"])->name("site.categoria");

Route::get("/carrinho", [CarrinhoController::class, "carrinhoLista"])->name("site.carrinho");
Route::post("/carrinho", [CarrinhoController::class, "adicionaCarrinho"])->name("site.addcarrinho");
Route::post("/remove", [CarrinhoController::class, "removeCarrinho"])->name("site.removecarrinho");