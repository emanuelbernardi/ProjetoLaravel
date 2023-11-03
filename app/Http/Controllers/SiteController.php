<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;

use Illuminate\Support\Facades\Gate;

class SiteController extends Controller
{
    public function index()
    {
        $produtos = Produto::paginate(8);

        return response(view('site.home', compact('produtos')));
        
    }

    public function details($id)
    {
        $produto = Produto::where('id', $id)->first();

        return response(view('site.details', compact('produto')));
        
    }

    public function categoria($id)
    {
        $categoria = Categoria::find($id);
        $produtos = Produto::where('id', $id)->paginate(3);

        return response(view('site.categoria', compact('produtos', 'categoria')));
        
    }
}
