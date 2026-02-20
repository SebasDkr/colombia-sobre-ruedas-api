<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Colombia Sobre Ruedas Rent a Car</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-brand img {
            height: 50px;
        }

        footer {
            background-color: #212529;
            color: #ffffff;
            padding: 20px 0;
            margin-top: 40px;
        }

        .admin-link {
            color: #ffc107 !important;
            font-weight: bold;
        }

        .logout-link {
            color: #dc3545 !important;
            font-weight: bold;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">

        <!-- LOGO -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}">
        </a>

        <!-- BOTÓN MOBILE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- MENÚ -->
        <div class="collapse navbar-collapse" id="menu">

           <ul class="navbar-nav ms-auto">

    {{-- inicio --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            Inicio
        </a>
    </li>


    {{-- catalogo publico --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('catalogo') }}">
            Catalogo
        </a>
    </li>


    {{-- admin --}}
    @if(session()->has('admin'))

        {{-- entrar al panel admin --}}
        <li class="nav-item">
            <a class="nav-link admin-link"
               href="{{ route('admin.dashboard') }}">

                Administrador

            </a>
        </li>

        {{-- cerrar sesion admin --}}
        <li class="nav-item">
            <a class="nav-link logout-link"
               href="{{ route('logout') }}">

                Salir Admin

            </a>
        </li>

    @else

        {{-- login admin --}}
        <li class="nav-item">
            <a class="nav-link admin-link"
               href="{{ route('login') }}">

                Administrador

            </a>
        </li>

    @endif



    {{-- cliente --}}
    @if(session()->has('cliente_id'))

        {{-- nombre cliente --}}
        <li class="nav-item">
            <span class="nav-link text-info">

                {{ session('cliente_nombre') }}

            </span>
        </li>


        {{-- panel cliente --}}
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('cliente.panel') }}">

                Mi Panel

            </a>
        </li>


        {{-- logout cliente --}}
        <li class="nav-item">
            <a class="nav-link logout-link"
               href="{{ route('cliente.logout') }}">

                Salir

            </a>
        </li>

    @else

        {{-- login cliente --}}
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('cliente.login') }}">

                Login

            </a>
        </li>


        {{-- registro cliente --}}
        <li class="nav-item">
            <a class="nav-link"
               href="{{ route('cliente.registro') }}">

                Registro

            </a>
        </li>

    @endif



    {{-- pagina nosotros --}}
    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('nosotros') }}">

            Nosotros

        </a>
    </li>


    {{-- pagina contacto --}}
    <li class="nav-item">
        <a class="nav-link"
           href="{{ route('contacto') }}">

            Contacto

        </a>
    </li>


</ul>


        </div>

    </div>
</nav>


<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')

</div>


<footer>
    <div class="container text-center">
        © {{ date('Y') }} Colombia Sobre Ruedas Rent a Car
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>