<ul class="navbar-nav bg-gradient-primary sidebar  sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Admin <sup>2</sup></div>
    </a>


    <hr class="sidebar-divider my-0">


    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->role == 'admin')
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Data
        </div>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('petugas') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Petugas</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('masyarakat') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>Masyarakat</span>
            </a>

        </li>
    @endif



    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Pengaduan
    </div>


    <li class="nav-item">
        <a class="nav-link" href="{{ route('tanggapan') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengaduan</span></a>
    </li>

    @if (Auth::user()->role == 'admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ route('laporan') }}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Laporan</span></a>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



</ul>
