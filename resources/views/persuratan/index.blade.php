@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Persuratan
        </div>
        <div class="card-body">
            <table class="table mt-4">
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
                    <tbody>
                        @foreach ($surat as $surats)
                      <tr>
                        <th scope="row">{{$loop->iteration}}</th>
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
                          <form action="/lihatsurat/{{$surats->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin me-reject surat ?')">
                              Reject Surat</button>
                          </form>
                        </td>
                      </tr>
                      @endforeach

                      </tbody>
                </tbody>
              </table>
        </div>
</div>
<div class="card mt-5">
        <div class="card-header">
          Persuratan
        </div>
        <div class="card-body">
            <table class="table mt-4">
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

                  <tr>
                    <th scope="row"></th>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                    <td>
                      <a href="/lihatsurat">
                        <button type="submit" class="btn btn-primary">
                          Terbitkan Surat
                      </button>
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
        </div>
      </div>

    

</div>

@endsection
    