<div class="text-white d-flex flex-column sidebar p-4">
    {{-- Logo --}}
    <div>
        <img src="{{ asset('image/smk.png')}}" alt="logo" style="width:120px; height:auto; margin-bottom:30px;">
    </div>

     {{-- USER MINI --}}
    <div class="d-flex align-items-center gap-2 mb-4 px-2 py-2 bg-white/10 rounded-lg">

        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center fw-bold"
             style="width:35px; height:35px;">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>

        <div class="lh-sm">
            <div class="fw-semibold small text-truncate" style="max-width:150px;">
                {{ Auth::user()->name }}
            </div>
            <div style="font-size:11px; color:#e5e7eb;">
                Petugas
            </div>
        </div>

    </div>


    <ul class="nav flex-column gap-2">

        {{-- Dashboard --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.dashboard') }}"
               class="nav-link sidebar-link {{ request()->routeIs('petugas.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>
        </li>

        {{-- PEMINJAMAN --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.peminjaman.index') }}"
                class="nav-link sidebar-link {{ request()->routeIs('petugas.peminjaman.index') ? 'active' : '' }}">
                Peminjaman
            </a>
        </li>

        {{-- PENGEMBALIAN --}}
        <li class="nav-item mb-2">
            <a href="{{ route('petugas.pengembalian.index') }}"
                class="nav-link sidebar-link {{ request()->routeIs('petugas.pengembalian.index') ? 'active' : '' }}">
                Konfirmasi Pengembalian
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

        {{-- Divider --}}
        <hr class="border-white opacity-25 my-3">

        {{-- logout --}}
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
