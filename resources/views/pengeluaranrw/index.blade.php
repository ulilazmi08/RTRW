@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Laporan Pengeluaran RW
        </div>
        <div class="card-body"> 
          <div class="row">
            <div class="col">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Pengeluaran
              </button>
            </div>
            <div class="col">
              <a class="btn btn-success" href="{{ route('export-pengeluaran') }}">Simpan Sebagai Excel</a>
            </div>
            <div class="col">
              <a class="btn btn-info" href="{{ route('export-pengeluaran-pdf') }}">Simpan Sebagai PDF</a>
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
              <form method="POST" action="/simpan_pengeluaran_rw" class="mb-5" enctype="multipart/form-data" >
                @csrf
              <div class="mb-3">
                <div class="md-3">
                  Nominal
                  <input required type="nominal" class="form-control @error('nominal') is-invalid @enderror " id="nominal" name="nominal" placeholder="Nominal">
                </div>
                <label for="nama_iuran" class="form-label">Tambah Pengeluaran</label>
                <input type="text" class="form-control @error('nama_iuran') is-invalid @enderror " id="nama_iuran" aria-describedby="emailHelp" name="nama_iuran" placeholder="Nama Pengeluaran . . ." required autofocus value="{{old('nama_iuran')}}">
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
              <input type="hidden" id="jenis" name="jenis" value="Pengeluaran">
              <input type="hidden" id="nama_pembayar" name="nama_pembayar" value="{{$namauser}}">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan Tanggal</button>
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
            @include('pengeluaranrw.table', $laporans)
            {{$laporans->links()}}
              {{-- <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">RT</th>
                    <th scope="col">Nominal</th>
                    <th scope="col">Via</th>
                    <th scope="col">Tanggal</th>
                  </tr>
                </thead>
                @foreach ($laporans as $laporan)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$laporan->nama_pembayar}}</td>
                  <td>{{$laporan->rt_pembayar}}</td>
                  <td>{{$laporan->nominal}}</td>
                  <td>{{$laporan->via}}</td>
                  <td>{{$laporan->created_at}}</td>
                </tr>
                <tr class= "bg-primary text-white">
                  <th scope="col">Total Pengeluaran : </th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th scope="col">{{$sumnominal}}</th>  
                </tr>
                @endforeach
                
                
              </table> --}}
        </div>
      </div>

</div>

@endsection
    