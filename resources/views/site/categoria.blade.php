@extends('site.layout')
@section('title', 'Categoria')
@section('conteudo')

<div class="row container">

    <h5> Categoria: {{$categoria->nome}}</h5>

    @foreach ($produtos as $item)
            <div class="col s12 m5">
                  <div class="card">
                    <div class="card-image">
                      <img src="https://picsum.photos/450/300">
                      <span class="card-title">{{Str::limit($item->nome, 20)}}</span>
                    </div>
                    <div class="card-content">
                        <span>R$: {{number_format($item->valor, 2, ',', '.')}}</span>
                        <a href="{{route('site.details', $item->id)}}" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                    </div>
                  </div>
            </div>
        
    @endforeach

</div>
<div class="row center">
    {{$produtos->links('custom.pagination')}}
</div>

@endsection