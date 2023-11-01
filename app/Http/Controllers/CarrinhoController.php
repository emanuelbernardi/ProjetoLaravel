<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
   public function carrinhoLista(){
    $item = \Cart::getContent();
    
    return view('site.carrinho', compact('item'));
   }

   public function adicionaCarrinho(Request $request){
    \Cart::add([
        'id' => $request->id,
        'name' => $request->nome,
        'price' => $request->valor,
        'quantity' => $request->quantidade,
    ]);

    return redirect()->route('site.carrinho')->with('Sucesso', 'Produto adicionado no carrinho com sucesso');
   }

   public function removeCarrinho(Request $request){
    \Cart::remove($request->id);
    return redirect()->route('site.carrinho')->with('Sucesso', 'Produto removido no carrinho com sucesso');
    }
   
}

