@extends('layouts.main')
@section('container')

<div class="row">
      <div class="card mt-5">
        <div class="card-header">
            <h1 class="h2">Selamat Datang {{ auth()->user()->name }}
                @if ($userrole == 3)
                    Ketua RT
                @endif
                @if ($userrole == 2)
                    Ketua RW 06
                @endif
            </h1>

        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3 text-center">
                    <a href="/panelrt" class="text-decoration-none">
                        <div class="card white">
                            <div class="card-header bg-primary text-light">
                                Panel RT
                            </div>
                        </div>
                    </a>
                </div>
                @if(Gate::check('ketuart') || Gate::check('admin') )
                <div class="col-md-3 text-center">
                    <a href="/profil/creaate" class="text-decoration-none">
                        <div class="card white">
                            <div class="card-header bg-primary text-light">
                                Tambah Warga
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            
                @if(Gate::check('ketuarw') || Gate::check('admin') )
                <div class="col-md-3 text-center">
                  <a href="/statistik" class="text-decoration-none">
                      <div class="card white">
                          <div class="card-header bg-primary text-light">
                              Statistik Warga
                          </div>
                      </div>
                  </a>
              </div>
              @endif
                @if(Gate::check('ketuart')  || Gate::check('bendahara') || Gate::check('admin') )
                    <div class="col-md-3 mt-3 text-center">
                        <a href="/buatiuran" class="text-decoration-none">
                            <div class="card white">
                                <div class="card-header bg-primary text-light">
                                    Buat Iuran
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
                @if (Gate::check('ketuart')  || Gate::check('bendahara') || Gate::check('admin'))
                <div class="col-md-3 mt-3 text-center">
                  <a href="/laporan_rt" class="text-decoration-none">
                      <div class="card white">
                          <div class="card-header bg-primary text-light">
                              Laporan Keuangan RT
                          </div>
                      </div>
                  </a>
                </div>
                @endif
                @if (Gate::check('ketuarw') || Gate::check('bendahararw') )
                <div class="col-md-3 text-center">
                  <a href="/laporan_rw" class="text-decoration-none">
                      <div class="card white">
                          <div class="card-header bg-primary text-light">
                              Laporan Keuangan RW
                          </div>
                      </div>
                  </a>
                </div>
                @endif
                @if (Gate::check('ketuarw') || Gate::check('bendahara') || Gate::check('admin'))
                <div class="col-md-3  text-center">
                  <a href="/laporan_rt" class="text-decoration-none">
                      <div class="card white">
                          <div class="card-header bg-primary text-light">
                              Laporan Keuangan RT
                          </div>
                      </div>
                  </a>
                </div>
                @endif
                @if (Gate::check('ketuart') || Gate::check('sekretaris') || Gate::check('sekretarisrw') || Gate::check('admin'))
                <div class="col-md-3 mt-3 text-center">
                  <a href="/surat" class="text-decoration-none">
                      <div class="card white">
                          <div class="card-header bg-primary text-light">
                            Pengajuan Surat
                          </div>
                      </div>
                  </a>
                </div>
                @endif
              @if (Gate::check('ketuart')  || Gate::check('admin'))
              <div class="col-md-3 mt-3 text-center">
                <a href="/daftarwarga" class="text-decoration-none">
                    <div class="card white">
                        <div class="card-header bg-primary text-light">
                          Daftar Warga RT
                        </div>
                    </div>
                </a>
              </div>
              @endif
                @if (Gate::check('ketuarw') || Gate::check('bendahara') || Gate::check('admin'))
                <div class="col-md-3 mt-3 text-center">
                    <a href="/daftarwargaadmin" class="text-decoration-none">
                        <div class="card white">
                            <div class="card-header bg-primary text-light">
                                Daftar Warga RW
                            </div>
                        </div>
                    </a>
                </div>
                @endif
            </div>
        </div>
</div>

@endsection
    