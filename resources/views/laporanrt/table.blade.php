<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Lengkap</th>
        <th scope="col">RT</th>
        <th scope="col">Nominal</th>
        <th scope="col">Via</th>
        <th scope="col">Jenis</th>
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
      <td>{{$laporan->jenis}}</td>
      <td>{{\Carbon\Carbon::parse($laporan->created_at)->format('d-m-Y')}}</td>
    </tr>
    @endforeach
  </table>
  
  <table class="table table-primary">
  <thead>
    <tr>
      <th scope="col">Total Pemasukan : </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th scope="col">{{$totalpemasukan}}</th>
    </tr>
  </thead>
  </table>
  <table class="table table-danger">
    <thead>
      <tr>
        <th scope="col">Total Pengeluaran : </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th scope="col">{{$totalpengeluaran}}</th>
      </tr>
    </thead>
    </table>
    <table class="table table-info">
      <thead>
        <tr>
          <th scope="col">Total Keuangan : </th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th scope="col">{{$totalsumnominal}}</th>
        </tr>
      </thead>
      </table>