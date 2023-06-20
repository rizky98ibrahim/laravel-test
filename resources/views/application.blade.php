<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Vite -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>

<body class="antialiased">
    <div id="app">
        <app-component></app-component>
    </div>
</body>

</html>