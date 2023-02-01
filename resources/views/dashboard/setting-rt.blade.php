@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Iuran Bulanan
        </div>
        <div class="card-body">
          <div class="me-autod-inline-block">
          <div class="col-md-3">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Setting RT
              </button>
        
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Setting RT</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/setting-rt" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_rt" class="form-label">Tambah RT</label>
                                <input type="text" class="form-control @error('nama_rt') is-invalid @enderror " id="nama_rt" aria-describedby="emailHelp" name="nama_rt" placeholder="Nomor RT" required autofocus value="{{old('nama_rt')}}">
                                    @error('nama_rt')
                                    <div  class="invalid-feedback">
                                        {{$message}}.
                                    </div>
                                    @enderror
                            </div>
                           
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>
          </div>
          </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <td>RT</td>
                    <td>Ketua RT</td>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($rt as $rts)
                  <tr>
                    <td> {{$loop->iteration}} </td>
                    <td>{{$rts->nama_rt}}</td>
                    <td>{{$rts->ketua_id}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
      </div>

</div>

@endsection
    