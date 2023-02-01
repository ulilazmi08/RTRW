<table class="table table-bordered mt-4">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Perihal</th> 
            <th scope="col">Tgl Pengajuan</th>
            <th scope="col">Keperluan</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($surat as $surats)
            @if ($surats->status == 0)
          <tr>
            <th scope="row">        
              {{ ($surat ->currentpage()-1) * $surat ->perpage() + $loop->index + 1 }}
            </th>
            <td>{{$surats->nama_pengirim}}</td>
            <td>{{$surats->jenis_surat}}</td>
            <td>{{$surats->created_at}}</td>
            <td>{{$surats->keperluan}}</td>
            <td>
              <a href="/lihatsurat/{{$surats->id}}">
                <button type="submit" class="btn btn-primary">
                  Tampilkan Surat
              </button>
              </a>
              <a href="/terbitkansurat/{{$surats->id}}">
                <button type="submit" class="btn btn-primary">
                  Terbitkan Surat
              </button>
              </a>
              <form action="/lihatsurat/{{$surats->id}}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin me-reject surat ?')">
                  Reject Surat</button>
              </form>
            </td>
          </tr>
          @endif
          @endforeach
          {{$surat->links()}}
    </tbody>
</table>