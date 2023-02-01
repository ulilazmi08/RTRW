@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
      <div class="row">
        <div class="card-header">
          Profil Warga  
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalKtp">
              Lihat KK
            </button>
              <!-- Modal -->
              <div class="modal fade" id="ModalKtp" data-bs-backdrop="static" tabindex="-1" aria-labelledby="ModalKtp" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      @foreach ($profils as $profil)
                      <label for="image_kk" class="form-label"></label>
                          @foreach ($profils as $profil)
                          @if ($profil->image_kk)
                          <img src = "{{asset('public/KartuKeluarga/'. $profil->image_kk)}}"class="img-previewkk img-fluid">
                          @else
                          <img class="img-previewkk  img-fluid">
                          @endif
                          @endforeach
                          <input type="file" id="image_kk" class="form-control mt-4" required name="image" onchange="previewImageKK()">
                          <input type="hidden" name="oldKk" id="oldKk" value="{{$profil->image_kk}}">
                          {{-- <input required name="image" class="form-control" type="file" id="image_ktp" name="image_ktp"> --}}
                      @endforeach
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                      <button type="button" type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Lihat KTP
            </button>
        
              <!-- Modal -->
              <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/profilktp" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="image_ktp" class="form-label">Gambar KTP</label>
                            @foreach ($profils as $profil)
                            @if ($profil->image_ktp)
                            <img src = "{{asset('public/Image/'. $profil->image_ktp)}}"class="img-preview img-fluid">
                            @else
                            <img class="img-preview img-fluid">
                            @endif
                            @endforeach
                            <img class="img-preview img-fluid">
                            <input type="file" id="image_ktp" class="form-control" required name="image" onchange="previewImage()">
                            {{-- <input required name="image" class="form-control" type="file" id="image_ktp" name="image_ktp"> --}}
                          </div>
                    </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Close
                          </button>
                          <button type="submit" class="btn btn-primary">
                            Simpan
                          </button>                    
                        </div>
                      </form>
                  </div>
                </div>
              </div>  
            <a class="btn btn-primary" href="/editprofilwarga/{{$idwarga}}" role="button">Edit Profil</a>
            <a class="btn btn-primary" href="#" role="button">Ganti RT</a>
            <table class="table mt-4">
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                    <th scope="row">Nama</th>
                    <td>{{$user->name}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Nomor KTP</th>
                    <td>{{$user->no_ktp}}</td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Email</th>
                    <td colspan="2">{{$user->email}}</td>
                  </tr>
                  @endforeach

                  @foreach ($profils as $profil)
                  <tr>
                    <th scope="row">Jenis Kelamin</th>
                    <td colspan="2">{{$profil->gender}}</td>
                  </tr>

                  <tr>
                    <th scope="row">Status</th>
                    <td colspan="2">{{$profil->status}}</td>
                  </tr>

                  <tr>
                    <th scope="row">Peran Keluarga</th>
                    <td colspan="2">{{$profil->peran_keluarga}}</td>
                  </tr>

                  <tr>
                    <th scope="row">RT</th>
                    <td colspan="2" value="{{$profil->rt_id}}" >{{$profil->rt_id}}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Tanggal Lahir</th>
                    <td colspan="2">{{$profil->tgl_lahir}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Agama</th>
                    <td colspan="2">{{$profil->agama}}</td>
                  </tr>
                  
                    <tr>
                    <th scope="row">Alamat</th>
                    <td colspan="2">{{$profil->alamat}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Alamat</th>
                    <td colspan="2">{{$profil->tempat_lahir}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Kewarganegaraan</th>
                    <td colspan="2">{{$profil->kewarganegaraan}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pendidikan</th>
                    <td colspan="2">{{$profil->pendidikan}}</td>
                  </tr>
                  <tr>
                    <th scope="row">Pekerjaan</th>
                    <td colspan="2">{{$profil->pekerjaan}}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Nomor Rumah</th>
                    <td colspan="2">{{$profil->no_rumah}}</td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Nomor Kontak</th>
                    <td colspan="2">{{$profil->no_kontak}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
        <div class="col mb-5">
                          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Anggota Keluarga
          </button>

          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota Keluarga</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @if ($userrole == 1 || $userrole ==2)
                <div class="modal-body">
                  <form method="POST" action="/simpankeluargaasrw" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" name="name" placeholder="Nama Lengkap" required autofocus value="{{old('name')}}">
                            @error('name')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <input type="hidden" id="no_keluarga" name="no_keluarga" value="{{$nokeluarga}}">

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="emailHelp" name="email" placeholder="Email" required autofocus value="{{old('email')}}">
                      @error('email')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="no_identitas" class="form-label">Nomor KTP / Nomor Identitas</label>
                      <input type="text" class="form-control @error('no_identitas') is-invalid @enderror " id="no_identitas" aria-describedby="emailHelp" name="no_identitas" placeholder="Nomor KTP" required autofocus value="{{old('no_identitas')}}">
                            @error('no_identitas')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="gender" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="gender">
                        <option selected>--Pilih--</option>
                          <option value="Laki Laki" selected>Laki Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>  
                    <div class="mb-3">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror " id="tgl_lahir" aria-describedby="emailHelp" name="tgl_lahir" placeholder="Tanggal Lahir" required autofocus value="{{old('tgl_lahir')}}">
                      @error('tgl_lahir')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="agama" class="form-label">Agama</label>
                      <select class="form-select" name="agama">
                          <option value="Islam" selected>Islam</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Protestan">Protestan</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="hubungan" class="form-label">Hubungan</label>
                      <select class="form-select" name="hubungan">
                          <option value="Suami" selected>Suami</option>
                          <option value="Istri">Istri</option>
                          <option value="Anak">Anak</option>
                          <option value="Cucu">Cucu</option>
                          <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="nama_rt" class="form-label">RT</label>
                      <select class="form-select" name="nama_rt">
                        @foreach ($rt as $rts)
                          @if (old('nama_rt') == $rts->id)   
                          <option value="{{$rts->nama_rt}}" selected>{{$rts->nama_rt}}</option>
                          @else
                          <option value="{{$rts->nama_rt}}">{{$rts->nama_rt}}</option>
                          @endif
                        @endforeach   
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="no_kontak" class="form-label">Nomor Kontak</label>
                      <input type="text" class="form-control @error('no_kontak') is-invalid @enderror " id="no_kontak" aria-describedby="emailHelp" name="no_kontak" placeholder="Nomor Rumah" required autofocus value="{{old('no_kontak')}}">
                      @error('no_kontak')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <select class="form-select" name="pendidikan">
                          <option value="Belum Sekolah" selected>Belum Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <select class="form-select" name="pekerjaan">
                          <option value="PNS" selected>PNS</option>
                          <option value="Militer">Militer</option>
                          <option value="Polisi">Polisi</option>
                          <option value="Dokter">Dokter</option>
                          <option value="Akademisi">Akademisi</option>
                          <option value="Karyawan Swasta">Karwayan Swasta</option>
                          <option value="Wirausaha">Wirausaha</option>
                          <option value="Belum Bekerja">Belum Bekerja</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat Rumah</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" aria-describedby="emailHelp" name="alamat" placeholder="Contoh : Jalan Rawatengah" required autofocus value="{{old('alamat')}}">
                      @error('alamat')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="no_rumah" class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control @error('no_rumah') is-invalid @enderror " id="no_rumah" aria-describedby="emailHelp" name="no_rumah" placeholder="Nomor Rumah" required autofocus value="{{old('no_rumah')}}">
                        @error('no_rumah')
                              <div  class="invalid-feedback">
                                {{$message}}.
                              </div>
                              @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>    
                  </form>
                </div>
                @else
                <div class="modal-body">
                  <form method="POST" action="/simpankeluarga" class="mb-5" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="emailHelp" name="name" placeholder="Nama Lengkap" required autofocus value="{{old('name')}}">
                            @error('name')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <input type="hidden" id="no_keluarga" name="no_keluarga" value="{{$nokeluarga}}">

                    <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="emailHelp" name="email" placeholder="Email" required autofocus value="{{old('email')}}">
                      @error('email')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="no_identitas" class="form-label">Nomor KTP / Nomor Identitas</label>
                      <input type="text" class="form-control @error('no_identitas') is-invalid @enderror " id="no_identitas" aria-describedby="emailHelp" name="no_identitas" placeholder="Nomor KTP" required autofocus value="{{old('no_identitas')}}">
                            @error('no_identitas')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="gender" class="form-label">Jenis Kelamin</label>
                      <select class="form-select" name="gender">
                        <option selected>--Pilih--</option>
                          <option value="Laki Laki" selected>Laki Laki</option>
                          <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>  
                    <div class="mb-3">
                      <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror " id="tgl_lahir" aria-describedby="emailHelp" name="tgl_lahir" placeholder="Tanggal Lahir" required autofocus value="{{old('tgl_lahir')}}">
                      @error('tgl_lahir')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="agama" class="form-label">Agama</label>
                      <select class="form-select" name="agama">
                          <option value="Islam" selected>Islam</option>
                          <option value="Hindu">Hindu</option>
                          <option value="Budha">Budha</option>
                          <option value="Protestan">Protestan</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="hubungan" class="form-label">Hubungan</label>
                      <select class="form-select" name="hubungan">
                          <option value="Suami" selected>Suami</option>
                          <option value="Istri">Istri</option>
                          <option value="Anak">Anak</option>
                          <option value="Cucu">Cucu</option>
                          <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    
                    <div class="mb-3">
                      <label for="nama_rt" class="form-label">RT</label>
                      <select class="form-select" name="nama_rt">
                        @foreach ($rt as $rts)
                          @if (old('nama_rt') == $rts->id)   
                          <option value="{{$rts->nama_rt}}" selected>{{$rts->nama_rt}}</option>
                          @else
                          <option value="{{$rts->nama_rt}}">{{$rts->nama_rt}}</option>
                          @endif
                        @endforeach   
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="no_kontak" class="form-label">Nomor Kontak</label>
                      <input type="text" class="form-control @error('no_kontak') is-invalid @enderror " id="no_kontak" aria-describedby="emailHelp" name="no_kontak" placeholder="Nomor Rumah" required autofocus value="{{old('no_kontak')}}">
                      @error('no_kontak')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                    </div>
                    <div class="mb-3">
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <select class="form-select" name="pendidikan">
                          <option value="Belum Sekolah" selected>Belum Sekolah</option>
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="SMK">SMK</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="pekerjaan" class="form-label">Pekerjaan</label>
                      <select class="form-select" name="pekerjaan">
                          <option value="PNS" selected>PNS</option>
                          <option value="Militer">Militer</option>
                          <option value="Polisi">Polisi</option>
                          <option value="Dokter">Dokter</option>
                          <option value="Akademisi">Akademisi</option>
                          <option value="Karyawan Swasta">Karwayan Swasta</option>
                          <option value="Wirausaha">Wirausaha</option>
                          <option value="Belum Bekerja">Belum Bekerja</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label for="alamat" class="form-label">Alamat Rumah</label>
                      <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" aria-describedby="emailHelp" name="alamat" placeholder="Contoh : Jalan Rawatengah" required autofocus value="{{old('alamat')}}">
                      @error('alamat')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                            @enderror
                      </div>
                      <div class="mb-3">
                        <label for="no_rumah" class="form-label">Nomor Rumah</label>
                        <input type="text" class="form-control @error('no_rumah') is-invalid @enderror " id="no_rumah" aria-describedby="emailHelp" name="no_rumah" placeholder="Nomor Rumah" required autofocus value="{{old('no_rumah')}}">
                        @error('no_rumah')
                              <div  class="invalid-feedback">
                                {{$message}}.
                              </div>
                              @enderror
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>    
                  </form>
                </div>
                @endif
                
              </div>
            </div>
          </div> 
          @if ($anggotakeluargas === 0)
          <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Umur</th>
                <th scope="col">Hubungan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">#</th>
                <td></td>
                <td></td>
                <td></td>
              </tr>
            </tbody>
          </table>
          @else
          <table class="table mt-3">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Umur</th>
                <th scope="col">Hubungan</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($anggotakeluargas as $user)
              @php
                $tanggal = Illuminate\Support\Facades\DB::table('anggota_keluarga')->pluck('tgl_lahir');
                $umur = Carbon\Carbon::parse($user->tgl_lahir)->age;
              @endphp
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$user->name}}</td>
                  <td>{{$umur}}</td>
                  <td>{{$user->hubungan}}</td>
                  @if ($userrole == 1 || $userrole ==2)
                  <td>
                    <form action="/deleteanggotaasrw/{{$user->id}}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin menghapus anggota keluarga ini ?')">
                        Hapus Anggota
                      </button>
                    </form>
                  </td> 
                  @else
                  <td>
                    <form action="/deleteanggota/{{$user->id}}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin menghapus anggota keluarga ini ?')">
                        Hapus Anggota
                      </button>
                    </form>
                  </td> 
                  @endif
                  
                </tr>
              @endforeach
            </tbody>
          </table>

          @endif
        </div>
        </div>
      </div>
    </div> 
</div>

<script>
  function previewImage() 
  {
  const image = document.querySelector('#image_ktp');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const oFReader = new FileReader ();
  oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function (oFREvent) 
    {
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>

@endsection
    