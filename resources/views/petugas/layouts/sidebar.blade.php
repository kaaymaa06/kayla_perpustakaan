<div class=" text-black p-3 d-flex flex-column sidebar" style="width: 250px; min-height: 100vh;">

    <div>
        <img src="{{ asset('image/logo.png')}}" alt="logo" style="width:120px; height:auto; margin-bottom:30px;">
    </div>

    <ul class="nav flex-column">

        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.dashboard') }}"
               class="nav-link sidebar-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>


        {{-- Daftar pengguna --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.akun.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('petugas.akun.index',
                'petugas.akun.edit', 'petugas.akun.view', 'petugas.akun.create') ? 'active' : '' }}">
                Daftar Pengguna
            </a>
        </li>

        {{-- Data buku --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.buku.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('petugas.buku.index',
                'petugas.buku.edit', 'petugas.buku.view', 'petugas.buku.create') ? 'active' : '' }}">
                Data Buku
            </a>
        </li>

        {{-- Profile --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.profile.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('petugas.profile.index') ? 'active' : '' }}">
                Profile
            </a>
        </li>

        {{-- logout --}}
        <li class="nav-item mb-2">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="nav-link sidebar-link">
                    Logout
                </button>
            </form>
        </li>
    </ul>

</div>

{{-- STYLE --}}
<style>
.sidebar{
    background-color: #DBEAFE;
}

.sidebar-link {
    color: black;
    border-radius: 8px;
    transition: 0.3s;
}

/* Hover effect */
.sidebar-link:hover {
    background-color: white;
    padding-left: 10px;
}

/* Active (halaman sekarang) */
.sidebar-link.active {
    background-color: #DBEAFE;
    font-weight: bold;
}
</style>
