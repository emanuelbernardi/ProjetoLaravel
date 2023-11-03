<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/app.css" />

    @if($mensagem = Session::get('erro'))
        {{ $mensagem }}
    @endif

    @if($errors->any())
        @foreach($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    @endif

    <div class="container" >

        <form action="{{route('login.auth')}}" method="POST">
            @csrf
            Email: <br> <input name="email"> <br>
            Senha: <br> <input type="password" name="password"> <br>
            <input type="checkbox" name="remember"> Lembre de mim
            <button type="submit"> Entrar </button>
        </form>

    </div>

</html>