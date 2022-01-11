<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <img src="{{asset('melody/images/faces/face16.jpg')}}" alt="image" />
                </div>
                <div class="profile-name">
                    <p class="name">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="designation">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts1" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Reportes</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('reports.day')}}">
                            <i class="fas fa-flag menu-icon"></i>
                            <span class="menu-title"> Reportes por día</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('reports.date')}}">
                            <i class="fas fa-flag menu-icon"></i>
                            <span class="menu-title"> Reportes por fecha</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts2" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">E-commerce</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts2">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories.index')}}">
                            <i class="fas fa-tags menu-icon"></i>
                            <span class="menu-title">Categorías</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('tags.index')}}">
                            <i class="fas fa-tag menu-icon"></i>
                            <span class="menu-title">Etiquetas</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sizes.index')}}">
                            <i class="fas fa-tag menu-icon"></i>
                            <span class="menu-title">Tamaños</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products.index')}}">
                            <i class="fas fa-boxes menu-icon"></i>
                            <span class="menu-title">Productos</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts3" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-chart-line menu-icon"></i>
                <span class="menu-title">Administración</span> </span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts3">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('purchases.index')}}">
                            <i class="fas fa-cart-plus menu-icon"></i>
                            <span class="menu-title">Compras</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('sales.index')}}">
                            <i class="fas fa-shopping-cart menu-icon"></i>
                            <span class="menu-title">Ventas</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('orders.index')}}">
                            <i class="fas fa-tag menu-icon"></i>
                            <span class="menu-title">Pedidos</span>
                        </a>
                    </li>
                    
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('clients.index')}}">
                            <i class="fas fa-users menu-icon"></i>
                            <span class="menu-title">Clientes</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        

        {{-- <li class="nav-item">
            <a class="nav-link" href="{{route('providers.index')}}">
                <i class="fas fa-shipping-fast menu-icon"></i>
                <span class="menu-title">Proveedores</span>
            </a>
        </li> --}}
        
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
                aria-controls="page-layouts">
                <i class="fas fa-cogs menu-icon"></i>
                <span class="menu-title">Sistema</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('users.index')}}">
                            <i class="fas fa-user-tag menu-icon"></i>
                            <span class="menu-title">Usuarios</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('roles.index')}}">
                            <i class="fas fa-user-cog menu-icon"></i>
                            <span class="menu-title">Roles</span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a class="nav-link" href="{{route('business.index')}}">
                            <i class="fas fa-folder menu-icon"></i>
                            <span class="menu-title">Empresa</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('printers.index')}}">
                            <i class="fas fa-copy menu-icon"></i>
                            <span class="menu-title">Impresora</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://softwow.co">
                <i class=" menu-icon"></i>
                <span class="menu-title">SoftWoW ♥ </span>
            </a>
        </li>
    </ul>
</nav>
