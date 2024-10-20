<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
        }

        footer {
            background-color: #02b0fa;
            padding: 10px;
            text-align: center;
        }

        .text-bold {
            font-weight: bold;
        }

    </style>
</head>
<body>

    <header style="background-color: #02b0fa; padding: 10px; text-align: center;">
        <h1>Manajemen Tugas</h1>
    </header>

    <div class="container mt-5">
        @yield('content')
    </div>

    <footer>
        <p class="text-bold mt-2">Manajemen Tugas, Rian Cahyo Anggoro</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
