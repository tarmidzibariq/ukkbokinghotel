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

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::routeIs('room.index') ? 'active' : ''}}{{ Request::routeIs('room.create') ? 'active' : '' }}{{ Request::routeIs('room.edit') ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('room.index') }}" >
            <i class="fas fa-fw fa-cog"></i>
            <span>Rooms</span>
        </a>
        {{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div> --}}
    </li>
    @php
        $satuin = ['facility-hotels.index','facility-hotels.create','facility-hotels.edit','facility-room.index','facility-room.create','facility-room.edit'];
        $rooms = ['facility-room.index','facility-room.create','facility-room.edit'];
        $hotels = ['facility-hotels.index','facility-hotels.create','facility-hotels.edit'];
    @endphp
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item {{ Request::routeIs($satuin) ? 'active' : ''}}">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Facility</span>
        </a>
        <div id="collapseUtilities" class="collapse {{ Request::routeIs($satuin) ? 'show' : ''}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header ">Custom Facility:</h6>
                <a class="collapse-item {{ Request::routeIs($hotels) ? 'active' : ''}}" href="{{ route('facility-hotels.index') }}">Facility Hotels</a>
                <a class="collapse-item {{ Request::routeIs($rooms) ? 'active' : ''}}" href="{{ route('facility-room.index') }}">Facility Rooms</a>
            </div>
        </div>
    </li>
    
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    

</ul>
