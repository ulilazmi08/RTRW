
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
      <th scope="row">{{ ($laporans ->currentpage()-1) * $laporans ->perpage() + $loop->index + 1 }}</th>
      <td>{{$laporan->nama_pembayar}}</td>
      <td>{{$laporan->rt_pembayar}}</td>
      <td>{{$laporan->nominal}}</td>
      <td>{{$laporan->via}}</td>
      <td>{{\Carbon\Carbon::parse($laporan->created_at)->format('d-m-Y')}}</td>
    </tr>
    @endforeach
    <tr class= "bg-primary text-white table-striped" >
      <th>Total Pengeluaran : </th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
      <th>{{$sumnominal}}</th> 
    </tr>
  </table>