<div class=" text-black p-3 d-flex flex-column sidebar" style="width: 250px; min-height: 100vh;">

    <div>
        <img src="{{ asset('image/logo.png')}}" alt="logo" style="width:120px; height:auto; margin-bottom:30px;">
    </div>

    <ul class="nav flex-column">

        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="/dashboard"
               class="nav-link sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
                🏠 Dashboard
            </a>
        </li>

        {{-- Transaksi --}}
        <li class="nav-item mb-2">
            <a href="/transaki"
               class="nav-link sidebar-link {{ request()->is('transaksi*') ? 'active' : '' }}">
                🔄 Transaksi
            </a>
        </li>


        {{-- Daftar pengguna --}}
        <li class="nav-item mb-2">
            <a href="{{ route('kepala.akun.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('kepala.akun.index',
                'kepala.akun.edit', 'kepala,akun.view', 'kepala.akun.create') ? 'active' : '' }}">
                👥 Daftar Pengguna
            </a>
        </li>

        {{-- Daftar buku --}}
        <li class="nav-item mb-2">
            <a href="{{ route('kepala.buku.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('kepala.buku.index',
                'kepala.buku.edit', 'kepala,buku.view', 'kepala.buku.create') ? 'active' : '' }}">
                📚 Daftar Buku
            </a>
        </li>

        {{-- Profile --}}
        <li class="nav-item mb-2">
            <a href="/profile"
               class="nav-link sidebar-link {{ request()->is('profile') ? 'active' : '' }}">
                👤 Profile
            </a>
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
