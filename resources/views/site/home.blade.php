@extends('site.layout')
@section('title', 'Essa é a pagina home')
@section('conteudo')

<div class="row container">

    @foreach ($produtos as $item)
            <div class="col s12 m5">
                <div class="card blue-grey darken-1">
                    <div class="card-content white-text">
                      <span class="card-title">{{Str::limit($item->nome, 20)}}</span>
                    </div>
                    <div class="card-action">
                        <span>{{$item->valor}}</span>
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


