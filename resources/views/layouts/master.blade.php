<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Videoclub - Tailwind</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

@include('partials.navbar')

<div class="container mx-auto px-4 py-8">
    @yield('content')
</div>

</body>
</html>
