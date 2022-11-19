@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Status Pengajuan Surat
        </div>
        <div class="card-body">
        
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Perihal</th>
                    <th scope="col">Tanggal Pengajuan</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($suratusers as $surat)
                  <tr>
                    <th scope="row">
                      {{ ($suratusers ->currentpage()-1) * $suratusers ->perpage() + $loop->index + 1 }}
                    </th>
                    <td>{{$surat->keperluan}}</td>
                    <td>{{$surat->created_at}}</td>
                    <td>{{$surat->nomor_surat}}</td>
                    <td>
                    @if ($surat->status == 0)
                        Belum Diterbitkan
                    @else
                        Sudah Diterbitkan
                    @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
      </div>

</div>

@endsection
    