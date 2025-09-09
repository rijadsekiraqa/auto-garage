<div class="ts-main-content">
    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">
            <li class="ts-label">Main</li>
            <li>
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i>Dashboard
                </a>
            </li>
            <li><a href="/brands"><i class="fa fa-files-o"></i>Brendet</a>
            </li>
            <li><a href="/clients" class="{{ request()->is('clients') ? 'active' : '' }}"><i class="fa fa-users"></i>
                    Klientet</a></li>
            <li><a href="/services"><i class="fa fa-users"></i>Serviset</a></li>
        </ul>
    </nav>
