        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route("home") }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{ ENV("APP_NAME") }}</div>
            </a>
            <hr class="sidebar-divider my-0">
                <x-sidebar_item icon="tachometer-alt" route="{{ route('dashboard') }}" title="dashboard"></x-sidebar_item>
                <x-sidebar_item icon="key" route="{{ route('role.index') }}" title="role"></x-sidebar_item>
                <x-sidebar_item icon="users" route="{{ route('user.index') }}" title="user"></x-sidebar_item>
                <x-sidebar_item icon="filter" route="{{ route('tipe.index') }}" title="tipe"></x-sidebar_item>
                <x-sidebar_item icon="dollar-sign" route="{{ route('skema.index') }}" title="skema"></x-sidebar_item>
                <x-sidebar_item icon="map" route="{{ route('area.index') }}" title="area"></x-sidebar_item>
                <x-sidebar_item icon="map" route="{{ route('wilayah.index') }}" title="wilayah"></x-sidebar_item>
                <x-sidebar_item icon="handshake" route="{{ route('pemilik.index') }}" title="pemilik"></x-sidebar_item>
                <x-sidebar_item icon="desktop" route="{{ route('fasilitas.index') }}" title="fasilitas"></x-sidebar_item>
                <x-sidebar_item icon="home" route="{{ route('unit.index') }}" title="unit"></x-sidebar_item>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
