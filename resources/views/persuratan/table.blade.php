<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Surat</th> 
            <th scope="col">Tgl Pengajuan</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Lihat</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($approvedsurats as $approved)
      <tr>
        <th scope="row">{{$loop->iteration}}</th>
        <td>{{$approved->nama_pengirim}}</td>
        <td>{{$approved->jenis_surat}}</td>
        <td>{{$approved->created_at}}</td>
        <td>{{$approved->keperluan}}</td>
        <td>
          <a href="/lihatsurat/{{$approved->id}}">
            <button type="submit" class="btn btn-primary">
              Tampilkan Surat
          </button>
          </a>
        </td>
      </tr>

      @endforeach
    </tbody>
</table>