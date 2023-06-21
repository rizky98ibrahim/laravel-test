<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Vite -->
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>



<body class=" h-full">
    <div id="app">
        <app-component></app-component>
    </div>
</body>

</html>
