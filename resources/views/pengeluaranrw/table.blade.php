<table class="table table-hover">
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
    @endforeach
    <tr class= "bg-primary text-white">
      <th>Total Pengeluaran : </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th>{{$sumnominal}}</th> 
    </tr>
  </table>
