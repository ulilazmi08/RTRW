@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
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
                      <form method="POST" action="/profil" class="mb-5" enctype="multipart/form-data">
                        <label class="form-label"> Upload KTP</label>
                        <input type="file" name="image_kk" id="image_kk">
                        </form>
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
                            <label for="image_ktp" class="form-label">Default file input example</label>
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

              
            <a class="btn btn-primary" href="/editprofil" role="button">Edit Profil</a>
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
    