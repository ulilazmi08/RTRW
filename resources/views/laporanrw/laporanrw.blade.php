@extends('layouts.main')
@section('container')
<div class="row">
  <div class="col-xl-4 col-lg-5">
    <div class="card text-white bg-primary mb-3" style="width: 18rem; margin">
      <div class="card-body">
      <h5 class="card-title">Laporan Pemasukan Keuangan</h5>
      <br> <br>
      <a href="pemasukan_rw" class="btn btn-primary stretched-link">
        <i data-feather="arrow-right-circle"></i>
          Menuju Laporan Pemasukan</a>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-5">
    <div class="card text-white bg-success mb-3" style="width: 18rem; margin">
      <div class="card-body">
      <h5 class="card-title">Laporan Pengeluaran Keuangan</h5>
      <br> <br>
      <a href="/pengeluaran_rw" class="btn btn-success stretched-link">
        <i data-feather="arrow-right-circle"></i>
          Menuju Laporan Pengeluaran</a>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-lg-5">
    <div class="card text-white bg-info mb-3" style="width: 18rem; margin">
      <div class="card-body">
      <h5 class="card-title">Laporan Keuangan</h5>
      <br> <br> <br>
      <a href="laporan_keuangan_rw" class="btn btn-info text-white stretched-link">
        <i data-feather="arrow-right-circle"></i>
          Menuju Laporan Keuangan</a>
      </div>
    </div>
  </div>
  

</div>

@endsection
    