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

        <h1>FinanceCircles</h1>
        <h3>Your team's finance manager</h3>

        {!! Form::open(['route' => 'user.register', 'method' => 'post']) !!}

        <label>
            {!! Form::text('username', null, ['class' => 'input', 'placeholder' => "Email"]) !!}
        </label>

        <label>
            {!! Form::text('cpf', null, ['class' => 'input', 'placeholder' => "CPF"]) !!}
        </label>

        <label>
            {!! Form::text('name', null, ['class' => 'input', 'placeholder' => "Name"]) !!}
        </label>

        <label>
            {!! Form::text('name', null, ['class' => 'input', 'placeholder' => "Phone"]) !!}
        </label>

        <label>
            {!! Form::password('password', ['placeholder' => "Password"]) !!}
        </label>

        {!! Form::submit('Register') !!}

        {!! Form::close() !!}
    </section>

</body>

</html>