@extends('layouts.main')
@section('container')
<style>
  p{
    color: white;
  }
  #cardpemasukan{
    min-height: 50px;
    box-shadow: 2px 10px;
    margin-bottom: 50px;
    width: 250px;
    text-align: center;

  }
</style>
<div class="row mt-4">
  <div class="col md-4">
      <div class="card">
          <div class="card-header">
            Laporan Keuangan RT
          </div>
          <div class="card-body">   
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Buat Laporan
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
              <form method="POST" action="/simpan_keuangan_rt" class="mb-5" enctype="multipart/form-data" >
                      @csrf
                    <div class="mb-3">
                      <label for="nama_laporan" class="form-label">Nama Laporan</label>
                      <input type="text" class="form-control @error('nama_laporan') is-invalid @enderror " id="nama_laporan" aria-describedby="emailHelp" name="nama_laporan" placeholder="Nama Laporan . . ." required autofocus value="{{old('nama_laporan')}}">
                          @error('nama_laporan')
                            <div  class="invalid-feedback">
                              {{$message}}.
                            </div>
                          @enderror
                    </div>
                    <div class="mb-3">
                      <label for="DariTanggal" class="form-label">Dari Tanggal</label>
                      <input type="date" class="form-control" id="dari" name="dari">
                    </div>
                    <div class="mb-3">
                      <label for="KeTanggal" class="form-label">Ke-Tanggal</label>
                      <input type="date" class="form-control" id="ke" name="ke">
                    </div>
                  </div>
                  <input type="hidden" id="rt" name="rt" value="{{$userrt}}">
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Tanggal</button>
                  </div>
              </form>
                </div>
              </div>
            </div>

            <div class="me-autod-inline-block">
              <div class="input-group mb-3">
                <span class="input-group-text"  id="basic-addon1">Search</span>
                <input style="width: 50px" type="text" class="form-control" placeholder="Cari . . ." aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
            </div>
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Laporan</th>
                  <th scope="col">Dari Tanggal</th>
                  <th scope="col">Sampai Tanggal</th>
                  <th scope="col">Detail</th>
                  
                </tr>
              </thead>
              <tbody>
                  @foreach ($laporankeuangans as $laporankeuangan)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$laporankeuangan->nama_laporan}}</td>
                  <td>{{\Carbon\Carbon::parse($laporankeuangan->dari)->format('j F, Y')}}</td>
                  <td>{{\Carbon\Carbon::parse($laporankeuangan->ke)->format('j F, Y')}}</td>
                  <td>
                    <a href="/detail_keuangan_rt/{{$laporankeuangan->id}}">
                      <button class="btn-primary">
                        Detail
                      </button>
                    </a>
                  <form action="/hapus-laporan-rt/{{$laporankeuangan->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin menghapus laporan ?')">
                      Hapus Laporan</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
              {{$laporankeuangans->links()}}
            </table>
            <br>
          </div>
        </div>

      </div>
</div>

@endsection
    