<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminLTE</title>
    <!-- AdminLTE CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>
<body class="hold-transition sidebar-mini">


<div class="wrapper">
    <!-- Menu Lateral -->
    @include('partials.sidebar')

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <!-- Logout Button -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/logout" title="Logout">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>
            </li>
        </ul>
    </nav>

    <!-- Conteúdo -->
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>



<footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
        Versão 1.0
    </div>
    <strong>&copy; 2024 <a href="#">CCB - ADM PONTA GROSSA - PR</a>.</strong> Todos os direitos reservados.
</footer>


<!-- AdminLTE JS (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</body>
</html>
