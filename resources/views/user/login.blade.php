<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Investindo </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Fredoka+One">
    </head>
    <body>

        <div class="background">

        </div>

        <section id="conteudo-view" class="login">

            <h1>Investindo</h1>
            <h3>O gerenciado de investimentos</h3>

           {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}

           <p>Acesse o sistema</p>

           <label for="">
               {!! Form::text('username', null, ['class' => 'input', 'placeholder' => "Usuário"]) !!}
           </label>
           <label for="">
            {!! Form::password('password', null, ['placeholder' => 'Senha']) !!}
           </label>

           {!! Form::submit('Entrar') !!}

           {!! Form::close() !!}

        </section>



    </body>
</html>
