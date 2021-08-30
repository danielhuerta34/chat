<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-warning elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset('img/app-logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle"
            style="opacity: .8">
        <span class="brand-text font-weight-light text-white">{{config('app.name')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @auth
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user-photo-default.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <p class="d-block text-white mb-0">{{Auth::user()->name}}</p>
            </div>
        </div>
        @endauth

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item {{ 'dashboard' == request()->path() ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}" class="nav-link text-white">
                        <i class="nav-icon fa fa-dashboard text-white"></i>
                        <p class="text-white">Panel</p>
                    </a>
                </li>
                <li class="nav-item {{ 'perfil' == request()->path() ? 'active' : '' }}">
                    <a href="{{route('profile')}}" class="nav-link">
                        <i class="nav-icon fa fa-user text-white"></i>
                        <p class="text-white">Perfil</p>
                    </a>
                </li>
                <li class="nav-item {{ 'usuarios' == request()->path() ? 'active' : '' }}">
                    <a href="{{route('users')}}" class="nav-link">
                        <i class="nav-icon fa fa-users text-white"></i>
                        <p class="text-white">Usuarios</p>
                    </a>
                </li>
                <li class="nav-item {{ 'chat' == request()->path() ? 'active' : '' }}">
                    <a href="{{route('chat')}}" class="nav-link">
                        <i class="nav-icon fa fa-comment-o text-white"></i>
                        <p class="text-white">Chat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon fa fa-sign-out text-white"></i>
                        <p class="text-white">Salir</p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>
                            Dashboard
                            <i class="right fa fa-angle-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Active Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>Inactive Page</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-th"></i>
                        <p>
                            Simple Link
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>