<div class="text-white d-flex flex-column sidebar p-4">

    {{-- Logo --}}
    <div class="text-center">
        <img src="{{ asset('image/logo.png')}}" alt="logo"
             class="logo-sidebar">
    </div>

    {{-- infor user login --}}
    <div class="d-flex align-items-center gap-2 mb-4 px-2 py-2 bg-white/10 rounded-lg">

        {{-- inisial nama --}}
        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center fw-bold"
             style="width:35px; height:35px;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>

        {{-- nama user --}}
        <div class="lh-sm">
            <div class="fw-semibold small text-truncate" style="max-width:150px;">
                {{ Auth::user()->name }}
            </div>

            {{-- role --}}
            <div style="font-size:11px; color:#e5e7eb;">
                Anggota
            </div>
        </div>

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
/* Container sidebar */
.sidebar {
    width: 260px; /*lebar side bar */
    min-height: 100vh; /* tinggi full layar*/
    background: linear-gradient(to right, #3b82f6, #0891b2); /*warna gradasi */
    border-top-right-radius: 30px; /* sudut kenan atas melengkung */
    border-bottom-right-radius: 30px; /*sudur kanan bawa melengkung */
    box-shadow: 4px 0 20px rgba(0,0,0,0.1); /*scroll kalau menu banyak*/
}

/* Logo */
.logo-sidebar {
    width: 110px; /*ukuran logo*/
    height: auto; /* biar proporsional*/
    margin-bottom: 10px; /*jarak bawah logo */
    filter: drop-shadow(0 4px 10px rgba(0,0,0,0.2)); /*efek bayangan logo*/
}

/* Link default */
.sidebar-link {
    color: white; /*warna teks */
    border-radius: 12px; /* sudut membulat*/
    padding: 10px 15px; /* jarak dalam*/
    transition: all 0.3s ease; /* animasi halus*/
    display: block; /* biar full area bisa klik*/
}

/* Hover menu*/
.sidebar-link:hover {
    background: rgba(255, 255, 255, 0.2);
    padding-left: 20px;
}

/* menu aktip */
.sidebar-link.active {
    background: rgba(255, 255, 255, 0.35); /* warna menu aktif */
    font-weight: 600; /* teks lebih tebal */
    box-shadow: inset 0 0 10px rgba(255,255,255,0.2); /* efek dalam */
}


/* Scroll halus (kalau menu banyak) */
.sidebar {
    overflow-y: auto;
}
</style>
