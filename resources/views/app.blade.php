<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @viteReactRefresh
    @vite('resources/js/main.jsx')
</head>
<body class="antialiased">
    <div id="app"></div> {{-- contenedor donde React montará la app --}}
</body>
</html>
