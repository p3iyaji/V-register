<aside class="sidebar">
    <button type="button" class="sidebar-close-btn !mt-4">
        <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
    </button>
    <div>
        <a href="{{ route('index') }}" class="sidebar-logo">
            <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
            <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
        </a>
    </div>
    <div class="sidebar-menu-area">
        <ul class="sidebar-menu" id="sidebar-menu">
            <li>
                <a href="{{ route('index')}}">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="menu-icon"></iconify-icon>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-menu-group-title">Operations</li>
            <li>
                <a href="{{ route('employeesList') }}">
                    <iconify-icon icon="mage:email" class="menu-icon"></iconify-icon>
                    <span>Employees</span>
                </a>
            </li>
        
            <li class="sidebar-menu-group-title">Visitors</li>
            <li>
                <a href="{{ route('visitorsList') }}">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>All Visitors</span>
                </a>
            </li>
            <li>
                <a href="{{ route('preRegistersList') }}">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>Pre-Registers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('walkInVisitors') }}">
                    <iconify-icon icon="fe:vector" class="menu-icon"></iconify-icon>
                    <span>Walk-in Visitors</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Users</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('usersList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Users List</a>
                    </li>
            
                    <li>
                        <a href="{{ route('addUser') }}"><i class="ri-circle-fill circle-icon text-info-600 w-auto"></i> Add User</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <iconify-icon icon="flowbite:users-group-outline" class="menu-icon"></iconify-icon>
                    <span>Departments</span>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('departmentsList') }}"><i class="ri-circle-fill circle-icon text-primary-600 w-auto"></i> Departments List</a>
                    </li>
                    <li>
                        <a href="{{ route('addDepartment') }}"><i class="ri-circle-fill circle-icon text-info-600 w-auto"></i> Add Department</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>