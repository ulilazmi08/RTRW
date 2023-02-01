@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Profil Warga  
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalkk">
              Lihat KK / Upload
            </button>
            <!-- Modal -->
            <div class="modal fade" id="Modalkk" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Modalkk" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalkk">Lihat / Upload Gambar Kk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="/profilkk" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
                Lihat KTP / Upload
            </button>
        
              <!-- Modal -->
              <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Upload / Lihat Gambar KTP</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="/profilktp" enctype="multipart/form-data">
                          @csrf
                          <div class="mb-3">
                            <label for="image_ktp" class="form-label"></label>
                            @foreach ($profils as $profil)
                            @if ($profil->image_ktp)
                            <img src = "{{asset('public/Image/'. $profil->image_ktp)}}"class="img-preview img-fluid">
                            @else
                            <img class="img-preview img-fluid">
                            @endif
                            @endforeach
                            <img class="img-preview img-fluid">
                            <input type="file" id="image_ktp" class="form-control mt-4" required name="image" onchange="previewImage()">
                            <input type="hidden" name="oldKtp" id="oldKtp" value="{{$profil->image_ktp}}">
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
                    <td colspan="2">{{\Carbon\Carbon::parse($profil->tgl_lahir)->format('d-m-Y')}}</td>
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
                    <th scope="row">Tempat Lahir</th>
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
  function previewImageKK() 
  {
  const image = document.querySelector('#image_kk');
  const imgPreview = document.querySelector('.img-previewkk');

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
    