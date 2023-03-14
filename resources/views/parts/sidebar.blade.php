<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
  <span class="align-middle">Aplikasi SPP</span>
</a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Halaman
            </li>

            <li class="sidebar-item {{ Route::is('admin.dashboard*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
      <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
    </a>
            </li>



            <li class="sidebar-item {{ Route::is('admin.siswa*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.siswa') }}">
      <i class="align-middle" data-feather="user"></i> <span class="align-middle">Siswa</span>
    </a>
            </li>

            @if (Auth::user()->getLevel('admin'))
                            <li class="sidebar-item {{ Route::is('admin.kelas*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.kelas') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Kelas</span>
                </a>
                        </li>

                        <li class="sidebar-item {{ Route::is('admin.petugas*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.petugas') }}">
                    <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Petugas</span>
                </a>
                        </li>

                        <li class="sidebar-item {{ Route::is('admin.spp*') ? 'active' : '' }}">
                            <a class="sidebar-link" href="{{ route('admin.spp') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">SPP</span>
                </a>
                        </li>

          @endif
            <li class="sidebar-item {{ Route::is('admin.laporan*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('admin.laporan') }}">
      <i class="align-middle" data-feather="book"></i> <span class="align-middle">Laporan</span>
    </a>
            </li>


        </ul>

        <div class="sidebar-cta">
            <div class="sidebar-cta-content">
                <div class="d-grid">
                    <a href="{{ route('admin.laporan.create') }}" class="btn btn-primary">+ Tambah Laporan</a>
                </div>
            </div>
        </div>
    </div>
</nav>
