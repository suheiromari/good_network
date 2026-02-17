<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PATIENTS</title>
    @vite('resources/css/app.css')
</head>

<body>

    <header>

        <nav>
            <h1>Patients Network</h1>

            <a href="{{ route('customers.index') }}" class="bg-orange">
                All Patients
            </a>

            <a href="{{ route('customers.store') }}">
                New Patient
            </a>

        </nav>
    </header>

    <main class="container">
        {{ $slot }}
    </main>


</body>

</html>