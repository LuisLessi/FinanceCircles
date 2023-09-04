<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
</head>

<body id="background">

    <section id="conteudo-view" class="register">

        @if(session('error'))
        <div class="error-message-register">
            {{ session('error') }}
        </div>
        @endif

        <h1>FinanceCircles</h1>
        <h3 class="tittle-register">Your team's finance manager</h3>

        {!! Form::open(['route' => 'user.register', 'method' => 'post']) !!}

        <label>
            {!! Form::text('name', null, ['class' => 'input', 'placeholder' => "Name: User"]) !!}
        </label>

        <label>
            {!! Form::text('email', null, ['class' => 'input', 'placeholder' => "Email: email@email.com"]) !!}
        </label>

        <label>
            {!! Form::text('cpf', null, ['class' => 'input', 'placeholder' => "CPF: 12345678999"]) !!}
        </label>

        <label>
            {!! Form::text('phone', null, ['class' => 'input', 'placeholder' => "Phone: 00111112222"]) !!}
        </label>

        <label>
            {!! Form::password('password', ['placeholder' => "Password: ***********"]) !!}
        </label>

        {!! Form::submit('Register') !!}

        {!! Form::close() !!}

    </section>


</body>

</html>