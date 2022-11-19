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
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>

</div>

@endsection
    