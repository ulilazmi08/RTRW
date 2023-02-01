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
                    <th scope="col">Tanggal Penerbitan</th>
                    <th scope="col">Nomor Surat</th>
                    <th scope="col">Status</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>

</div>

@endsection
    