@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Setting Role Warga
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">No Rumah</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($role == 3)
                    @foreach ($getall as $key => $row)
                    @csrf
                    <tbody>
                          <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$arraynama[$key]}}</td>
                            <td>{{$row['no_rumah']}}</td>
                            <td>
                              <a href="#">
                                <button type="submit" class="btn btn-primary">
                                  Jadikan RT
                              </button>
                              </a>
                            </td>
                          </tr>
                          @endforeach
                      </tbody>
                    @endif
                </tbody>
              </table>
        </div>
      </div>

    

</div>

@endsection
    