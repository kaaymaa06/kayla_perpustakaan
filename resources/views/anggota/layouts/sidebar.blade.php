<div class="text-white d-flex flex-column sidebar p-4">
    {{-- Logo --}}
    <div>
        <img src="{{ asset('image/logo.png')}}" alt="logo" style="width:120px; height:auto; margin-bottom:30px;">
    </div>

    <ul class="nav flex-column gap-2">

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

        {{-- Riwayat Peminjaman --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.riwayat.index') }}"
            class="nav-link sidebar-link {{ request()->routeIs('anggota.pengembalian.index') ? 'active' : '' }}">
                Riwayat Peminjaman
            </a>
        </li>

        {{-- Profile --}}
        <li class="nav-item mb-2">
            <a href="{{ route('anggota.profile.index') }}"
               class="nav-link sidebar-link {{ request()->routeIs('anggota.profile.index') ? 'active' : '' }}">
                Profile
            </a>
        </li>

        {{-- logout --}}
        <li class="nav-item mt-2">
            <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit"
            class="w-full text-left px-4 py-2 hover:bg-gray-100">
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
    background: linear-gradient(to bottom, #6366f1, #9333ea);
    border-top-right-radius: 30px;
    border-bottom-right-radius: 30px;
}

/* Link default */
.sidebar-link {
    color: white;
    border-radius: 12px;
    padding: 10px 15px;
    transition: 0.3s;
}

/* Hover */
.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.2);
    padding-left: 18px;
}

/* Active */
.sidebar-link.active {
    background: rgba(255, 255, 255, 0.3);
    font-weight: 600;
}

/* Logout hover khusus */
button.sidebar-link:hover {
    background: rgba(255, 0, 0, 0.3);
}
</style>
