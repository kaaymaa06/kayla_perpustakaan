<div class="text-white d-flex flex-column sidebar p-4">

    {{-- Logo --}}
    <div class="text-center">
        <img src="{{ asset('image/logo.png')}}" alt="logo"
             class="logo-sidebar">
    </div>

    <ul class="nav flex-column gap-2 mt-3">

        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.dashboard') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        {{-- Katalog buku --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.buku.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.buku.index') ? 'active' : '' }}">
                Katalog Buku
            </a>
        </li>

        {{-- Peminjaman --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.peminjaman.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.peminjaman.index') ? 'active' : '' }}">
                Peminjaman
            </a>
        </li>

        {{-- Riwayat --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.riwayat.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.riwayat.index') ? 'active' : '' }}">
                Riwayat
            </a>
        </li>

        {{-- Profile --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.profile.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.profile.index') ? 'active' : '' }}">
                Profile
            </a>
        </li>

        {{-- Divider --}}
        <hr class="border-white opacity-25 my-3">

        {{-- Logout --}}
        <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="nav-link sidebar-link w-100 text-start border-0 bg-transparent text-white">
                    Logout
                </button>
            </form>
        </li>

    </ul>

</div>

{{-- STYLE --}}
<style>
.sidebar {
    width: 260px;
    min-height: 100vh;
    background: linear-gradient(160deg, #6366f1, #9333ea);
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
    box-shadow: 4px 0 20px rgba(0,0,0,0.1);
}

/* Logo */
.logo-sidebar {
    width: 110px;
    height: auto;
    margin-bottom: 10px;
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.2));
}

/* Link default */
.sidebar-link {
    color: white;
    border-radius: 12px;
    padding: 10px 15px;
    transition: all 0.3s ease;
    display: block;
}

/* Hover */
.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.2);
    padding-left: 20px;
}

/* Active */
.sidebar-link.active {
    background: rgba(255, 255, 255, 0.35);
    font-weight: 600;
    box-shadow: inset 0 0 10px rgba(255,255,255,0.2);
}

/* Logout hover */
button.sidebar-link:hover {
    background: rgba(255, 0, 0, 0.3);
}

/* Scroll halus (kalau menu banyak) */
.sidebar {
    overflow-y: auto;
}
</style>
