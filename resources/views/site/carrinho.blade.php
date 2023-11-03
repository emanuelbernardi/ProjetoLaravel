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

    @if($mensagem = Session::get('aviso'))
    <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title">Tudo bem</span>
          <p>{{$mensagem}}</p>
        </div>
      </div>
    @endif

    @if($item->count() == 0)
    <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">seu carrinho está vazio</span>
          <p>Aproveite nossas promoções</p>
        </div>
      </div>
    @else
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
                        <form action="{{route('site.atualizacarrinho')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $items->id }}">
                            <td><input style="40px; font-weight:900;" class="white center" min="1" type="number" name="quantity" value="{{$items->quantidade}}"></td>
                            <td>  
                            <button class="btn-floating waves-effect waves-light green"><i class="material-icons">refresh</i></button>
                        </form>
                        
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

        <h5> Valor total: </h5>
        <div class="card orange">
          <div class="card-content white-text">
            <span class="card-title">{{number_format(\Cart::getTotal(), 2, ',', '.')}}</span>
            <p>Pague em 12X sem juros !</p>
          </div>
        </div>

    @endif

      <div class="row container center">
        <a href="{{route('site.index')}}" class="btn waves-effect waves-light blue"> Continuar Comprando <i class="material-icons right">arrow_back</i></a href="{{route('site.limparcarrinho')}}">
        <a href="{{route('site.limparcarrinho')}}" class="btn waves-effect waves-light blue"> Limpar Carrinho <i class="material-icons">clear</i></a href="">
        <button class="btn waves-effect waves-light green"> Finalizar Pedido <i class="material-icons">check</i></button>

      </div>      

</div>

@endsection