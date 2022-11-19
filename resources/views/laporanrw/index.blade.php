@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Laporan Keuangan RW
        </div>
        <div class="card-body">   
          <div class="me-autod-inline-block">
          <div class="col-md-3">
            <div class="my-2">
            </div>
          </div>
          </div>  
          <div class="row">
            <div class="col">
              <a class="btn btn-primary" href="/export-keuangan/{{$id}}">Simpan Sebagai Excel</a>
            </div>
            <div class="col">
              <a class="btn btn-success" href="/export-keuangan-pdf/{{$id}}">Simpan Sebagai PDF</a>
            </div>
          </div>
          @include('laporanrw.table', $laporans)
          </div>
      </div>

</div>

@endsection
    