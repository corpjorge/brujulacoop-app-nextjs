<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ruleta::Admin</title>

    <link rel="stylesheet" href="/assets/css/bootstrap-5.0.0-alpha-2.min.css" />
    <link rel="stylesheet" href="{{ asset('skins/alert/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('skins/css/global.css') }}">
</head>

<body>
    <header>
        @if(Auth::user())
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Encuestas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Usuarios</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <form action="{{ route('admin.signout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-light btn-logout">
                            Cerrar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        @endif
    </header>
    <main>
        @yield('content')
    </main>

    <!-- JavaScript Bundle with Popper -->
    <script src="/assets/js/bootstrap.5.0.0.alpha-2-min.js"></script>
    <script src="{{ asset('skins/datatable/jquery.min.js') }}"></script>
    <script src="{{ asset('skins/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('skins/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('skins/alert/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('skins/js/main.js') }}"></script>
    @yield('script')
</body>

</html>