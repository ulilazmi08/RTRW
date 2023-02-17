<div id="sidebarMenu" class="collapse col-md-3 col-lg-2 d-md-block bg-light sidebar ">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column" style="font-size: 1.2rem;">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('home') ? 'active' : ''}}" aria-current="page" href="/home">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('status-pengajuan') ? 'active' : ''}}" href="/status-pengajuan">
            <span data-feather="mail"></span>
            Status Pengajuan
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link {{Request::is('profil') ? 'active' : ''}}" href="/profil">
            <span data-feather="user"></span>
            Profil
          </a>
        </li>
        @if (Gate::check('ketuart') || Gate::check('bendahara') || Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('laporan_rt') ? 'active' : ''}}" href="/laporan_rt">
            <span data-feather="book"></span>
            Keuangan RT
          </a>
        </li>
        @endif
        @if (Gate::check('ketuarw') || Gate::check('bendahararw') || Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('laporan_rw') ? 'active' : ''}}" href="/laporan_rw">
            <span data-feather="book"></span>
            Keuangan RW
          </a>
        </li>
        @endif
      </ul>
      @if (Gate::check('ketuarw') || Gate::check('bendahara') || Gate::check('bendahararw') || Gate::check('admin') || Gate::check('ketuart') || Gate::check('sekretaris') || Gate::check('sekretarisrw'))
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Bagian Pengurus</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      @endif
      <ul class="nav flex-column mb-2" style="font-size: 1.2rem;">
        @if (Gate::check('ketuarw') || Gate::check('bendahara') || Gate::check('bendahararw') || Gate::check('admin') || Gate::check('ketuart') || Gate::check('sekretaris') || Gate::check('sekretarisrw'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('panelrt') ? 'active' : ''}}" href="/panelrt">
            <span data-feather="navigation"></span>
            Dashboard Pengurus
          </a>
        </li>
        @endif
        @if (Gate::check('ketuart') || Gate::check('ketuarw')|| Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('profil/create') ? 'active' : ''}}" href="/profil/create">
            <span data-feather="users"></span>
            Tambah Warga
          </a>
        </li>
        @endif
       
        @if (Gate::check('admin') || Gate::check('ketuarw'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-rt') ? 'active' : ''}}" href="/setting-rt">
            <span data-feather="tool"></span>
            Setting RT
          </a>
        </li>
        @endif
        @if (Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-ketuarw') ? 'active' : ''}}" href="/setting-ketuarw">
            <span data-feather="tool"></span>
            Setting Ketua RW
          </a>
        </li>
        @endif
        @if (Gate::check('ketuarw') || Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('setting-ketuart') ? 'active' : ''}}" href="/setting-ketuart">
            <span data-feather="tool"></span>
            Setting Ketua RT
          </a>
        </li>
        @endif
        @if (Gate::check('ketuarw') || Gate::check('ketuart') || Gate::check('sekretaris') || Gate::check('sekretarisrw') || Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link {{Request::is('statistik') ? 'active' : ''}}" href="/statistik">
            <span data-feather="file-text"></span>
            Statistik Warga
          </a>
        </li>
        @endif
        @if (Gate::check('ketuart') || Gate::check('bendahararw') || Gate::check('admin') )
         <li class="nav-item">
          <a class="nav-link {{Request::is('buatiuran') ? 'active' : ''}}" href="/buatiuran">
            <span data-feather="calendar"></span>
            Buat Iuran
          </a>
        </li>
        @endif
        @if (Gate::check('ketuart') || Gate::check('ketuarw') || Gate::check('sekretaris') || Gate::check('sekretarisrw') || Gate::check('admin'))
         <li class="nav-item">
          <a class="nav-link {{Request::is('surat') ? 'active' : ''}} " href="/surat">
            <span data-feather="mail"></span>
            Lihat Pengajuan Surat
          </a>
        </li>
        @endif
        @if (Gate::check('ketuart') || Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link  {{Request::is('daftarwarga') ? 'active' : ''}}" href="/daftarwarga">
            <span data-feather="users"></span>
            Daftar Warga
          </a>
        </li>
        @endif  
        @if ( Gate::check('ketuarw') || Gate::check('admin'))
          <li class="nav-item">
            <a class="nav-link  {{Request::is('daftarwargaadmin') ? 'active' : ''}}" href="/daftarwargaadmin">
              <span data-feather="file-text"></span>
              Daftar Warga RW
            </a>
          </li>
        @endif

        @if (Gate::check('admin'))
        <li class="nav-item">
          <a class="nav-link  {{Request::is('setting') ? 'active' : ''}}" href="/setting">
            <span data-feather="file-text"></span>
            Setting Tempat
          </a>
        </li>
      @endif
      </ul>
    </div>
  </div>