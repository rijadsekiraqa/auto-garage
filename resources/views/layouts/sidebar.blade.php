<div class="ts-main-content">
    <nav class="ts-sidebar">
        <ul class="ts-sidebar-menu">

            <li class="ts-label">Main</li>
            <li>
                <a href="/dashboard" class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-dashboard"></i> Dashboard
                </a>
            </li>

            <li><a href="#"><i class="fa fa-files-o"></i>Brendet</a>
                <ul>
                    <li><a href="/brands">Menaxho Brendet</a></li>
                </ul>
            </li>

            <li><a href="#"><i class="fa fa-sitemap"></i> Vehicles</a>
                <ul>
                    <li><a href="/vehicles-create">Post a Vehicle</a></li>
                    <li><a href="/vehicles">Manage Vehicles</a></li>
                </ul>
            </li>
            <li><a href="/service-create"><i class="fa fa-users"></i>Servisi</a></li>
            <li><a href="/clients" class="{{ request()->is('clients') ? 'active' : '' }}"><i class="fa fa-users"></i>
                    Reg Users</a></li>





        </ul>
    </nav>
