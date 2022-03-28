<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    @if(Auth::check())
    @if(Auth::user()->role == 'admin')
    @php
        $roomtipe = ['room-tipe.index','room-tipe.create'];
        $rooms = ['room.index','room.create','room.edit'];
        $farooms = ['facility-room.index','facility-room.create','facility-room.edit'];
        $bersatu = ['room-tipe.index','room-tipe.create', 'room.index','room.create','room.edit', 'facility-room.index','facility-room.create','facility-room.edit'];
    @endphp
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::routeIs($bersatu) ? 'active' : ''}}">
        <a class="nav-link collapsed" href=""data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseUtilities" >
            <i class="fas fa-bed"></i>
            <span>Rooms Tipe</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::routeIs($bersatu) ? 'show' : ''}}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Room Tipe:</h6>
                <a class="collapse-item {{ Request::routeIs($roomtipe) ? 'active' : ''}}" href="{{ route('room-tipe.index') }}">Room Tipe</a>
                <a class="collapse-item {{ Request::routeIs($farooms) ? 'active' : ''}}" href="{{ route('facility-room.index') }}">Facility Rooms Tipe</a>
                <a class="collapse-item {{ Request::routeIs($rooms) ? 'active' : ''}}" href="{{ route('room.index') }}">Rooms</a>
            </div>
        </div>
    </li>
    @php
        $fahotels = ['facility-hotels.index','facility-hotels.create','facility-hotels.edit'];
    @endphp
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::routeIs($fahotels) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-warehouse"></i>
            <span>Hotels</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ Request::routeIs($fahotels) ? 'show' : ''}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header ">Custom Hotels:</h6>
                <a class="collapse-item {{ Request::routeIs($fahotels) ? 'active' : ''}}" href="{{ route('facility-hotels.index') }}">Facility Hotels</a>
                {{-- <a class="collapse-item {{ Request::routeIs($farooms) ? 'active' : ''}}" href="{{ route('facility-room.index') }}">Facility Rooms</a> --}}
            </div>
        </div>
    </li>
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    @endif
    @if(Auth::user()->role == 'Resepsionis')

    @php
        $reservation = ['reservasi.index'];
        $laporan = ['laporan.index'];
    @endphp
    <li class="nav-item {{ Request::routeIs($reservation) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('reservasi.index') }}">
            <i class="fas fa-shopping-cart"></i>
            <span>Reservasi</span>
        </a>
    </li>
    {{-- <li class="nav-item {{ Request::routeIs($laporan) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('laporan.index') }}">
            <i class="fas fa-file"></i>
            <span>Laporan</span>
        </a>
    </li> --}}
    @endif
    @endif

</ul>
