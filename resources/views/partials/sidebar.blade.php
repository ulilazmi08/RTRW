<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : ''}}" aria-current="page" href="/home">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('status-pengajuan') ? 'active' : ''}}" href="status-pengajuan">
            <span data-feather="mail"></span>
            Status Pengajuan
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link {{Request::is('profil') ? 'active' : ''}}" href="/profil">
            <span data-feather="users"></span>
            Profil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('laporan_rt') ? 'active' : ''}}" href="laporan_rt">
            <span data-feather="book"></span>
            Laporan Keuangan RT
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('laporan_rw') ? 'active' : ''}}" href="/laporan_rw">
            <span data-feather="book"></span>
            Laporan Keuangan RW
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="update_password">
            <span data-feather="lock"></span>
            Update Password
          </a>
        </li>
      </ul>

      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Saved reports</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <a class="nav-link {{Request::is('profil/create') ? 'active' : ''}}" href="/profil/create">
            <span data-feather="file-text"></span>
            Tambah Warga
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-rt') ? 'active' : ''}}" href="/setting-rt">
            <span data-feather="file-text"></span>
            Setting RT
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-ketuarw') ? 'active' : ''}}" href="/setting-ketuarw">
            <span data-feather="file-text"></span>
            Setting Ketua RW
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-ketuart') ? 'active' : ''}}" href="/setting-ketuart">
            <span data-feather="file-text"></span>
            Setting Ketua RT
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('panelrt') ? 'active' : ''}}" href="/panelrt">
            <span data-feather="file-text"></span>
            Panel RT
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('statistik') ? 'active' : ''}}" href="/statistik">
            <span data-feather="file-text"></span>
            Statistik Warga
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{Request::is('buatiuran') ? 'active' : ''}}" href="/buatiuran">
            <span data-feather="calendar"></span>
            Buat Iuran
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link {{Request::is('surat') ? 'active' : ''}} " href="/surat">
            <span data-feather="file-text"></span>
            Lihat Pengajuan Surat
          </a>
        </li>
        @can('ketuart')
        <li class="nav-item">
          <a class="nav-link  {{Request::is('daftarwarga') ? 'active' : ''}}" href="/daftarwarga">
            <span data-feather="file-text"></span>
            Daftar Warga
          </a>
        </li>
        @endcan 
        @can('admin')
        <li class="nav-item">
          <a class="nav-link  {{Request::is('daftarwargaadmin') ? 'active' : ''}}" href="/daftarwargaadmin">
            <span data-feather="file-text"></span>
            Daftar Warga RW
          </a>
        </li>
        @endcan 
        <li class="nav-item">
          <a class="nav-link" href="/setting-kepala">
            <span data-feather="calendar"></span>
            Ubah Kepala Keluarga
          </a>
        </li>
      </ul>
    </div>
  </nav>