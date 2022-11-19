@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Edit Profil  
        </div>
        <div class="card-body">
      @foreach ($users as $user)
        @foreach ($profils as $profil)
      <form method="POST" action="/editprofil/{{$user->id}}" class="mb-5" enctype="multipart/form-data">
                {{-- @method('PUT') --}}
                @csrf
                <div class="mb-3">
                  <label for="name" class="form-label">Nama</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror " id="name" aria-describedby="emailHelp" name="name" placeholder="Nama Lengkap" required autofocus 
                    value="{{old('name', $user->name)}}">
                  @error('name')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                  <label for="no_ktp" class="form-label">Nomor KTP</label>
                  <input type="text" class="form-control @error('no_ktp') is-invalid @enderror " id="no_ktp" aria-describedby="emailHelp" name="no_ktp" placeholder="Nomor KTP" required autofocus value="{{old('no_ktp', $user->no_ktp)}}">
                        @error('no_ktp')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control @error('email') is-invalid @enderror " id="email" aria-describedby="emailHelp" name="email" placeholder="Email" required autofocus value="{{old('email', $user->email)}}">
                  @error('email')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
              @endforeach
                  <div class="mb-3">
                  <label for="status" class="form-label">Status Pernikahan</label>
                  <select id="status" class="form-select" name="status">
                      <option value="Belum Menikah" >Belum Menikah</option>
                      <option value="Sudah Menikah"selected>Sudah Menikah</option>
                  </select>
                </div>
                  <div class="mb-3">
                  <label for="peran_keluarga" class="form-label">Peran Keluarga</label>
                  <select id="peran_keluarga" class="form-select" name="peran_keluarga"  >
                      <option value="Suami" selected>Suami</option>
                      <option value="Istri">Istri</option>
                  </select>
                </div>

                <script type="text/javascript">
                  document.getElementById("status").oninput = function(){  
                  var status = document.getElementById("status").value;
                  var peran_keluarga = document.getElementById("peran_keluarga").value; 
                  var result = status.localeCompare("Belum Menikah")
                  //var enable = document.getElementById("peran_keluarga");
                  //alert(result);
                  if (result == 0) {
                    document.getElementById("peran_keluarga").disabled=true;
                  }
                  if (result != 0) {
                    document.getElementById("peran_keluarga").disabled=false;
                  }
                   }
                </script>
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
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" name="gender">
                      <option value="Laki Laki" selected>Laki Laki</option>
                      <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
               
                <div class="mb-3">
                  <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                  <input type="date" class="form-control @error('tgl_lahir',$profil->tgl_lahir) is-invalid @enderror " id="tgl_lahir" aria-describedby="emailHelp" name="tgl_lahir" placeholder="Tanggal Lahir" required autofocus value="{{old('tgl_lahir')}}">
                  @error('tgl_lahir')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                  <label for="agama" class="form-label">Agama</label>
                  <select class="form-select"  value="{{old('alamat',$profil->agama)}}" name="agama">
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Protestan">Protestan</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Konghucu">Konghucu</option>
                  </select>
                </div>

                 <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat Rumah</label>
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror " id="alamat" aria-describedby="emailHelp" name="alamat" placeholder="Contoh : Jalan Rawatengah" required autofocus value="{{old('alamat',$profil->alamat)}}">
                  @error('alamat')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>

                <div class="mb-3">
                  <label for="no_rumah" class="form-label">Nomor Rumah</label>
                  <input type="text" class="form-control @error('no_rumah') is-invalid @enderror " id="no_rumah" aria-describedby="emailHelp" name="no_rumah" placeholder="Nomor Rumah" required autofocus value="{{old('no_rumah',$profil->no_rumah)}}">
                  @error('no_rumah')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
                <div class="mb-3">
                  <label for="no_kontak" class="form-label">Nomor Kontak</label>
                  <input type="text" class="form-control @error('no_kontak') is-invalid @enderror " id="no_kontak" aria-describedby="emailHelp" name="no_kontak" placeholder="Nomor Rumah" required autofocus value="{{old('no_kontak',$profil->no_kontak)}}">
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
                  </select>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control @error('password') is-invalid @enderror " id="password" aria-describedby="emailHelp" name="password" placeholder="Password" required autofocus value="{{old('password')}}">
                  <input type="checkbox" onclick="myFunction()">Lihat Password
                  @error('password')
                        <div  class="invalid-feedback">
                          {{$message}}.
                        </div>
                        @enderror
                </div>
            @endforeach
                <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
        </div>
      </div>
      <script>
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
        </script>
</div>

@endsection
    