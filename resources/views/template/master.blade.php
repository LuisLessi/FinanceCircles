<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{!! asset('css/stylesheet.css') !!}">
    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">

    <title>Finance Circles</title>
    @yield('styles-view')
</head>
<body>
    @include('template.menu-lateral') 
    @yield('content-view')
    @yield('scripts-view')
</body>
</html>