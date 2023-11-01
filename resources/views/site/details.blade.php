@extends('site.layout')
@section('title', 'Detalhes')
@section('conteudo')

<div class="row container">
    <div class="col s12 m6">
        <img src="https://picsum.photos/450/300" class="img-responsive">
    </div>

    <div class="col s12 m6">
        <h4> {{$produto->nome}} </h4>
        <h4>R$ {{number_format($produto->valor, 2, ',', '.')}} </h4>

        <p> Postado por: {{$produto->user->name}} </p> <br>
         Categoria: {{$produto->categoria->nome}} 
        </p>

        <form action="{{route('site.addcarrinho')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$produto->id}}">
            <input type="hidden" name="nome" value="{{$produto->nome}}">
            <input type="hidden" name="valor" value="{{$produto->valor}}">
            <input type="number" name="quantidade" value="1">
        <button class="btn green btn-large"> Adicionar </button>
        </form>
    </div>

</div>

@endsection