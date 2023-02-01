@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Laporan Keuangan RT
        </div>
        <div class="card-body">
          <div class="me-autod-inline-block">
          <div class="col-md-3">
            <div class="input-group mb-3">
              <span class="input-group-text"  id="basic-addon1">Search</span>
              <input style="width: 50px" type="text" class="form-control" placeholder="Cari . . ." aria-label="Username" aria-describedby="basic-addon1">
            </div>
          </div>
          </div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>

</div>

@endsection
    