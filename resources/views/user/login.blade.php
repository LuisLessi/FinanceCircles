<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>

<body id="background">

    <section id="conteudo-view" class="login">
        <h1>FinanceCircles</h1>
        <h3>Your team's finance manager</h3>

        {!! Form::open(['route' => 'user.login', 'method' => 'post']) !!}
        <p>Access the system</p>

        <label>
            {!! Form::text('username', null, ['class' => 'input', 'placeholder' => "Email"]) !!}
        </label>

        <label>
            {!! Form::password('password', ['placeholder' => "Password"]) !!}
        </label>

        {!! Form::submit('Login') !!}

        <p>Or</p>

        <a href="{{ route('user.register') }}" class="register-link">Register</a>
        <br>

        @if(session('error'))
        <div class="error-message">
            {{ session('error') }}
        </div>
        @endif
        {!! Form::close() !!}
    </section>

</body>

</html>