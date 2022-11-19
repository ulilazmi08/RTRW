@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Laporan Pemasukan RT
        </div>
        <div class="card-body">   
          <div class="row">
            <div class="col">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Pemasukan
              </button>
            </div>
            <div class="col">
              <a class="btn btn-success" href="{{ route('export-pemasukan-rt') }}">Simpan Sebagai Excel</a>
            </div>
            <div class="col">
              <a class="btn btn-info" href="{{ route('export-pemasukan-rt-pdf') }}">Simpan Sebagai PDF</a>
            </div>
          </div>
      <!-- Button trigger modal -->
     

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="POST" action="/simpan_pemasukan_rt" class="mb-5" enctype="multipart/form-data" >
                @csrf
              <div class="mb-3">
                <div class="md-3">
                  Nominal
                  <input required type="nominal" class="form-control @error('nominal') is-invalid @enderror " id="nominal" name="nominal" placeholder="Nominal">
                </div>
                <label for="nama_iuran" class="form-label">Tambah Pemasukan</label>
                <input type="text" class="form-control @error('nama_iuran') is-invalid @enderror " id="nama_iuran" aria-describedby="emailHelp" name="nama_iuran" placeholder="Nama Pemasukan . . ." required autofocus value="{{old('nama_iuran')}}">
                    @error('nama_iuran')
                      <div  class="invalid-feedback">
                        {{$message}}.
                      </div>
                    @enderror
              </div>
              <div class="mb-3">
                <label for="via" class="form-label">Metode Pembayaran</label>
                <select id="via" class="form-select" name="via">
                    <option value="Cash"selected>Cash</option>
                    <option value="Transfer">Transfer</option>
                </select>
            </div>
              <input type="hidden" id="rt_pembayar" name="rt_pembayar" value="{{$rt_pembayar}}">
              <input type="hidden" id="jenis" name="jenis" value="Pemasukan">
              <input type="hidden" id="nama_pembayar" name="nama_pembayar" value="{{$namauser}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Pemasukan RT</button>
            </div>
        </form>
            </div>
          </div>
        </div>
      </div>
          <div class="me-autod-inline-block">
          <div class="col-md-3">
            <div class="my-2">
            </div>
          </div>
          </div>
          @include('pemasukanrt.table', $laporans)
          {{$laporans->links()}}
        </div>
      </div>

</div>

@endsection
    