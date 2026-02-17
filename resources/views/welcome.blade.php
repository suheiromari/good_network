<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Good Network</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-center  px-8 py-12">
    <h1> Welcome </h1>
    <p> click the button below to find the list </p>
    <a href="/customers" class="btn">
        Find Network
    </a>
</body>
</html>