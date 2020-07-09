<div class="sidebar-container">
    <div class="sidebar-menu">
        <a href="javascript:void(0)" class="sidebar-menu-link sidebar-link-with-children">
            <div class="sidebar-link-icon">
                <div class="sidebar-avatar" style="background:url('{{ $user->settings->avatar }}')"></div>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Account' ) }}
            </div>
            <div class="sidebar-dropdown">
                <a href="{{ url( '/settings/' . $user->id ) }}" class="sidebar-dropdown-item">{{ __( 'Settings' ) }}</a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="sidebar-dropdown-item">{{ __( 'Logout' ) }}</a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </a>
        <a href="{{ url( '/admin/dashboard/' . $user->id ) }}" class="sidebar-menu-link">
            <div class="sidebar-link-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Dashboard' ) }}
            </div>
        </a>
        <a href="{{ url( '/admin/users' ) }}" class="sidebar-menu-link">
            <div class="sidebar-link-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Employees' ) }}
            </div>
        </a>
        <a href="{{ url( '/admin/clients' ) }}" class="sidebar-menu-link">
            <div class="sidebar-link-icon">
                <i class="fas fa-user-tie"></i>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Clients' ) }}
            </div>
        </a>
        <a href="{{ url( '/admin/projects' ) }}" class="sidebar-menu-link">
            <div class="sidebar-link-icon">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Projects' ) }}
            </div>
        </a>
        <a href="{{ url( '/admin/archives' ) }}" class="sidebar-menu-link">
            <div class="sidebar-link-icon">
                <i class="fas fa-archive"></i>
            </div>
            <div class="sidebar-link-text">
                {{ __( 'Archives' ) }}
            </div>
        </a>
    </div>
    <div class="sidebar-collapse-container">
        <div class="sidebar-collapse-icon-container sidebar-collapse-icon-container-open">
            <span><i class="fas fa-sign-out-alt"></i></span>
        </div>
        <div class="sidebar-collapse-text-container">
            {{ __( 'Collpase' ) }}
        </div>
    </div>
</div>