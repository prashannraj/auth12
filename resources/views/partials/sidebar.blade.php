<!-- filepath: resources/views/partials/sidebar.blade.php -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <div class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
    <div class="sidebar-brand-icon">
        @if($company && $company->logo)
            <img src="{{ asset('storage/' . $company->logo) }}" alt="Logo" style="width: 40px; height: 40px; object-fit: contain;">
        @else
            <i class="fas fa-laugh-wink"></i> {{-- fallback icon --}}
        @endif
    </div>
    <div class="sidebar-brand-text mx-3">
        {{ $company->name ?? 'Company Name' }}
    </div>
</div>


    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Components -->
     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComponents"
            aria-expanded="true" aria-controls="collapseComponents">
            <i class="fas fa-fw fa-cog"></i>
            <span>Company Details</span>
        </a>
        <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Company Information</h6>
                <a class="collapse-item" href="{{ route('company-infos.edit', $company->id) }}">Company info</a>
                <a class="collapse-item" href="{{ route('branches.index') }}">Branches</a>
                <a class="collapse-item" href="{{ route('advisors.index') }}">Advisors</a>
                <a class="collapse-item" href="#">Email Senders</a>
                <a class="collapse-item" href="#">Service Fees</a>
                <a class="collapse-item" href="#">Templates</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
      <!-- Nav Item - Components -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseComponents"
            aria-expanded="true" aria-controls="collapseComponents">
            <i class="fas fa-fw fa-cog"></i>
            <span>Company</span>
        </a>
        <div id="collapseComponents" class="collapse" aria-labelledby="headingComponents" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="#">Buttons</a>
                <a class="collapse-item" href="#">Cards</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="#">Login</a>
                <a class="collapse-item" href="#">Register</a>
                <a class="collapse-item" href="#">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="#">404 Page</a>
                <a class="collapse-item" href="#">Blank Page</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>   
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
    <!-- Nav Item - User    -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user"></i>
            <span>Users</span></a>
    </li>    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>