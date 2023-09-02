<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Sitio Web')</title>
    <!-- Enlaces a tus hojas de estilo CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <!-- Barra de navegación -->
        <nav>
            <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/acerca-de">Acerca de</a></li>
                <li><a href="/contacto">Contacto</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <!-- Contenido de la página -->
        @yield('content')
    </main>

    <footer>
        <!-- Pie de página -->
        &copy; {{ date('Y') }} Mi Sitio Web
    </footer>

    <!-- Scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
