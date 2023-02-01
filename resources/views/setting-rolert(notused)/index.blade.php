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
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">No Rumah</th>
                    <th scope="col">Aksi</th>
                    
                </tr>
            </thead>
            <tbody>
              {{-- object ketua sebagai index, row itu isi object di index tsb --}}
              @foreach  ($ketua  as $key => $row) 
                @if ($count3 < 10)
                    @if ($row ['role'] != 1)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$row ['name']}}</td>
                  <td>{{$profils[$key]->rt_id }}</td>
                  @if ($role == $count3)
                    @if ($row ['role'] == 3)
                      <td>
                        <a href="/setting-rolert6/{{$row->id}}">Jadikan Warga</a>         
                      </td>
                      @endif
                  @endif
                  @if ($row ['role'] == 6)
                  <td>
                    <a href="/setting-rolert/{{$row->id}}">Jadikan RT</a>         
                  </td>
                </tr>
                    @endif
                  @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    

</div>

@endsection
    