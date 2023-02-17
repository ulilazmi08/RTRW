@extends('layouts.main')
@section('container')

<div class="row">
      <div class="card mt-5">
        <div class="card-header">
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{session('success')}}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <h1 class="h2">
               Setting Tempat
            </h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 text-center">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Modalkk">
                    Upload Logo
                  </button>
                </div>
            <div class="modal fade" id="Modalkk" data-bs-backdrop="static" tabindex="-1" aria-labelledby="Modalkk" aria-hidden="true">
              <div class="modal-dialog modal-xl">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="Modalkk">Upload Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="/uploadlogo" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <label for="logo" class="form-label"></label>
                          @foreach ($tempat as $logos)
                          @if ($logos->logo)
                          <img src = "{{asset('public/Logo/'. $logos->logo)}}"class="img-previewkk img-fluid">
                          @else
                          <img class="img-previewkk img-fluid">
                          @endif
                          @endforeach
                          <input type="file" id="logo" class="form-control mt-4" required name="image" onchange="previewImageKK()">
                          <input type="hidden" name="oldLogo" id="oldLogo" value="{{$logos->logo}}">
                          {{-- <input required name="image" class="form-control" type="file" id="logorw" name="logorw"> --}}
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
                @if( Gate::check('admin') )
                <div class="col-md-3">
                    <!-- Button trigger modal -->
                    @if ($countsetting == 0)
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                       Edit Tempat
                  </button>
                    @else
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#">
                      Edit Tempat
                  </button>
                    @endif
                    
                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <form method="POST" action="/simpansetting" class="mb-5" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                          <label for="rw" class="form-label">RW</label>
                                          <input type="text" class="form-control @error('rw') is-invalid @enderror " id="rw" aria-describedby="emailHelp" name="rw" placeholder="Nomor RW" required autofocus value="{{old('rw')}}">
                                          @error('rw')
                                                <div  class="invalid-feedback">
                                                  {{$message}}.
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                          <label for="kelurahan" class="form-label">Kelurahan</label>
                                          <input type="text" class="form-control @error('kelurahan') is-invalid @enderror " id="kelurahan" aria-describedby="emailHelp" name="kelurahan" placeholder="Nama Kelurahan" required autofocus value="{{old('kelurahan')}}">
                                                @error('kelurahan')
                                                <div  class="invalid-feedback">
                                                  {{$message}}.
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                          <label for="kecamatan" class="form-label">Kecamatan</label>
                                          <input type="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror " id="kecamatan" aria-describedby="emailHelp" name="kecamatan" placeholder="Nama Kecamatan" required autofocus value="{{old('kecamatan')}}">
                                          @error('kecamatan')
                                                <div  class="invalid-feedback">
                                                  {{$message}}.
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="kota" class="form-label">kota</label>
                                            <input type="kota" class="form-control @error('kota') is-invalid @enderror " id="kota" aria-describedby="emailHelp" name="kota" placeholder="Nama kota" required autofocus value="{{old('kota')}}">
                                            @error('kota')
                                                  <div  class="invalid-feedback">
                                                    {{$message}}.
                                                  </div>
                                                  @enderror
                                          </div>
                                            
                                         <div class="mb-3">
                                          <label for="provinsi" class="form-label">Provinsi</label>
                                          <input type="text" class="form-control @error('provinsi') is-invalid @enderror " id="provinsi" aria-describedby="emailHelp" name="provinsi" placeholder="Contoh : DKI Jakarta" required autofocus value="{{old('provinsi')}}">
                                          @error('provinsi')
                                                <div  class="invalid-feedback">
                                                  {{$message}}.
                                                </div>
                                                @enderror
                                          </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                @endif
                <table class="table mt-3">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Rw</th>
                      <th scope="col">Kelurahan</th>
                      <th scope="col">Kecamatan</th>
                      <th scope="col">Kota</th>
                      <th scope="col">Provinsi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($tempat as $datatempat)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                      <td>{{$datatempat->rw}}</td>
                      <td>{{$datatempat->kelurahan}}</td>
                      <td>{{$datatempat->kecamatan}}</td>
                      <td>{{$datatempat->kota}}</td>
                      <td>{{$datatempat->provinsi}}</td>
                      <td> <button type="button" class="btn btn-primary text-center" data-bs-toggle="modal" data-bs-target="#editModal1{{$datatempat->id}}">
                        Edit Tempat
                      </button></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="modal fade" id="editModal1{{$datatempat->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Setting Tempat</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <div class="card-body">
                            <form method="POST" action="/updatetempat/{{$datatempat->id}}" class="mb-5" enctype="multipart/form-data">
                              @csrf
                              <div class="mb-3">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control @error('rw') is-invalid @enderror " id="rw" aria-describedby="emailHelp" name="rw" placeholder="Nomor RW" required autofocus value="{{old('rw', $datatempat->rw)}}">
                                @error('rw')
                                      <div  class="invalid-feedback">
                                        {{$message}}.
                                      </div>
                                      @enderror
                              </div>
                              <div class="mb-3">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror " id="kelurahan" aria-describedby="emailHelp" name="kelurahan" placeholder="Nama Kelurahan" required autofocus value="{{old('kelurahan', $datatempat->kelurahan)}}">
                                      @error('kelurahan')
                                      <div  class="invalid-feedback">
                                        {{$message}}.
                                      </div>
                                      @enderror
                              </div>
                              <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror " id="kecamatan" aria-describedby="emailHelp" name="kecamatan" placeholder="Nama Kecamatan" required autofocus value="{{old('kecamatan', $datatempat->kecamatan)}}">
                                @error('kecamatan')
                                      <div  class="invalid-feedback">
                                        {{$message}}.
                                      </div>
                                      @enderror
                              </div>
                              <div class="mb-3">
                                  <label for="kota" class="form-label">kota</label>
                                  <input type="kota" class="form-control @error('kota') is-invalid @enderror " id="kota" aria-describedby="emailHelp" name="kota" placeholder="Nama kota" required autofocus value="{{old('kota', $datatempat->kota)}}">
                                  @error('kota')
                                        <div  class="invalid-feedback">
                                          {{$message}}.
                                        </div>
                                        @enderror
                                </div>
                                  
                               <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror " id="provinsi" aria-describedby="emailHelp" name="provinsi" placeholder="Contoh : DKI Jakarta" required autofocus value="{{old('provinsi', $datatempat->provinsi)}}">
                                @error('provinsi')
                                      <div  class="invalid-feedback">
                                        {{$message}}.
                                      </div>
                                      @enderror
                                </div>
                              <button type="submit" class="btn btn-primary">Simpan</button>
                          </form>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
            </div>
        </div>
</div>
<script>
  
  function previewImageKK() 
  {
  const image = document.querySelector('#logo');
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
    