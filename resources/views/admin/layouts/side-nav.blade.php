<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link white-background"
       style="display: flex; justify-content: center; align-items: center; background-color: white; padding: 10px;">
        <!-- Logo da marca -->
        <span class="logo-lg">
            <img src="{{ asset('/logo/logo1.png') }}" alt="CCB" style="height: 95px;">
        </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar"
         style="max-height: 100vh; overflow-y: auto; overflow-x: hidden; width: 100%; padding-right: 0;">
        <!-- Painel do usuário na sidebar (opcional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-column align-items-center text-center">
            <a class="d-block">Ponta Grossa - PR</a>
            <a class="d-block">Login: {{ auth()->user()->name }}</a>
            <a class="d-block" id="datetime"></a>
        </div>
        <!-- Formulário de busca na sidebar -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Menu da sidebar -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Início do menu -->
                <div class="sidebar">
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column">
                            <!-- Item de menu: Início -->
                            <li class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Início</p>
                                </a>
                            </li>
                            <!-- Item de menu com sub-menu: Pessoas -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Pessoas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('people.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Pessoas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('people.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Adicionar Nova Pessoa</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Item de menu com sub-menu: Igrejas -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-place-of-worship"></i>
                                    <p>
                                        Igrejas
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('igreja.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Igrejas Cadastradas</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('igreja.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Adicionar Nova Igreja</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Item de menu com sub-menu: Eventos -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-calendar"></i>
                                    <p>
                                        Eventos
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('events.index') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Eventos</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('events.create') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Criar Novo Evento</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Item de menu com sub-menu: Enfermaria -->
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-clinic-medical"></i>
                                    <p>
                                        Enfermaria
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('infirmary.select-person') }}" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Protuários</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </ul>
        </nav>

        <!-- /.menu da sidebar -->
    </div>
    <!-- /.sidebar -->
    <script>
        function updateDateTime() {
            const now = new Date();
            document.getElementById('datetime').textContent = now.toLocaleString('pt-BR', {
                day: '2-digit',
                month: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
        }

        // Atualiza a data e hora ao carregar a página
        updateDateTime();

        // Atualiza a data e hora a cada segundo
        setInterval(updateDateTime, 1000);
    </script>
    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            max-height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            width: 100%;
            padding-right: 0;
        }

        .nav-sidebar .nav-item {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</aside>
