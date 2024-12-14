<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link" style="background-color: white; display: inline-table; padding: 20px">

    <span class="logo-lg">
        <img src="{{ asset('/logo/logo1.png') }}" alt="CCB" style="height: 80px;">
    </span>

    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Início</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('people.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Pessoas</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('events.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>Eventos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('infirmary.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-clinic-medical"></i>
                        <p>Enfermaria</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
