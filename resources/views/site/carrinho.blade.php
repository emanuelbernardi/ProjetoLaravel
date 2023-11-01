@extends('site.layout')
@section('title', 'Carrinho')
@section('conteudo')

<div class="row container">
    @if($mensagem = Session::get('Sucesso'))
    <div class="card green">
        <div class="card-content white-text">
          <span class="card-title">Parabéns</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>
    @endif

    <h5> Carrinho: </h5>
      <table class="striped">
        <thead>
          <tr>
              <th>Name</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($item as $items)
            <tr>
                <td>{{$items->name}}</td>
                <td>R$ {{number_format($items->price, 2, ',', '.')}}</td>
                <td><input style="40px; font-weight:900;" class="white center" type="number" name="quantity" value="{{$items->quantity}}"></td>
                <td>  
                    <button class="btn-floating waves-effect waves-light green"><i class="material-icons">refresh</i></button>
                    
                    <form action="{{route('site.removecarrinho')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $items->id }}">
                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                    </form>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="row container center">
        <button class="btn waves-effect waves-light blue"> Continuar Comprando <i class="material-icons right">arrow_back</i></button>
        <button class="btn waves-effect waves-light blue"> Limpar Carrinho <i class="material-icons">clear</i></button>
        <button class="btn waves-effect waves-light green"> Finalizar Pedido <i class="material-icons">check</i></button>

      </div>      

</div>

@endsection