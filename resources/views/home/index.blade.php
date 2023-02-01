@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
            <h1 class="h2">My Dashboard {{auth()->user()->name}} </h1>
        </div>
        <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <a href="#" class="text-decoration-none">
                    <div class="card white">
                        <div class="card-header bg-primary text-light">
                            DASHBOARD
                          </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="#" class="text-decoration-none">
                    <div class="card white">
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                            Ajukan Surat
                          </button>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="/iuran" class="text-decoration-none">
                    <div class="card white">
                        <div class="card-header bg-primary text-light">
                            Iuran Bulanan 
                          </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 text-center">
                <a href="/profil" class="text-decoration-none">
                    <div class="card white">
                        <div class="card-header bg-primary text-light">
                            Profil
                          </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 mt-3 text-center">
                <a href="#" class="text-decoration-none">
                    <div class="card white">
                        <div class="card-header bg-primary text-light">
                            Laporan Keuangan
                          </div>
                    </div>
                </a>
            </div>
        </div>
        </div>
      </div>

       <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Ajukan Surat</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="/buatsurat" class="mb-5" enctype="multipart/form-data" >
                                      @csrf
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <th scope="row">
                                                       <div class="mb-3">
                                                          <label for="jenis_surat" class="form-label">Pilih</label>
                                                          <select class="form-select" name="jenis_surat">
                                                              <option value="Membuat KTP Baru" selected>KTP Baru / Perpanjang</option>
                                                              <option value="Membuat Kartu Keluarga Baru">Buat / Perpanjang KK</option>
                                                          </select>
                                                        </div>
                                                  </th>
                                                  <td>
                                                      <div class="mb-3">
                                                          <label for="keperluan" class="form-label">Keperluan</label>
                                                          <input type="text" class="form-control @error('keperluan') is-invalid @enderror " id="keperluan" aria-describedby="emailHelp" name="keperluan" placeholder="Contoh : Membuat Surat ...* " required autofocus value="{{old('keperluan')}}">
                                                              @error('keperluan')
                                                                <div  class="invalid-feedback">
                                                                  {{$message}}.
                                                                </div>
                                                              @enderror
                                                        @foreach ($profils as $profil)
                                                          <input type="hidden" id="nama_pengirim" name="nama_pengirim" value="{{$nama}}">
                                                          <input type="hidden" id="tgl_lahir_pengirim" name="tgl_lahir_pengirim" value="{{$profil->tgl_lahir}}">
                                                          <input type="hidden" id="agama_pengirim" name="agama_pengirim" value="{{$profil->agama}}">
                                                          <input type="hidden" id="jenis_kelamin_pengirim" name="jenis_kelamin_pengirim" value="{{$profil->gender}}">
                                                          <input type="hidden" id="pekerjaan_pengirim" name="pekerjaan_pengirim" value="{{$profil->pekerjaan}}">
                                                          <input type="hidden" id="alamat_pengirim" name="alamat_pengirim" value="{{$profil->alamat}}">
                                                          <input type="hidden" id="rt_pengirim" name="rt_pengirim" value="{{$profil->rt_id}}">
                                                        @endforeach  
                                                        </div>
                                                  </td>
                                                  <td>
                                                    <div class="mb-3">
                                                      <button type="submit" class="btn btn-primary">
                                                        Ajukan Surat
                                                    </button>
                                                    </div>
                                                  </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>

</div>

@endsection
    