<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>

    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{route('passwords.index')}}" class="nav-link {{request()->routeIs(['passwords.*'])?'active':''}}">
                    <i class="nav-icon fas fa-solid fa-key"></i>
                    <p>
                        Passwords
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('teams.index')}}" class="nav-link {{request()->routeIs(['teams.*'])?'active':''}}">
                    <i class="nav-icon fas fa-solid fa-users"></i>
                    <p>
                        Teams
                    </p>
                </a>
            </li>
            <li class="nav-header">Settings</li>
            <li class="nav-item">
                <a href="{{route('users.index')}}" class="nav-link {{request()->routeIs(['users.*'])?'active':''}}">
                    <i class="nav-icon fas fa-solid fa-users-cog"></i>
                    <p>
                        Users
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/gallery.html" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-lock"></i>
                    <p>
                        Roles & Permission
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
