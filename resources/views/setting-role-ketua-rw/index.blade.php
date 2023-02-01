@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Setting Role Ketua RW
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status Warga</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($role == 1)
                    @foreach ($role2 as $rw)
                    @csrf
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$rw->name}}</td>
                      <td>
                        <a href="/setting-role6/{{$rw->id}}">
                          <button type="submit" class="btn btn-primary">
                            Jadikan Warga
                        </button>
                        </a>
                      </td>
                    @endforeach
                    @endif
                      </tr>
                      @foreach ($notadmin as $user)
                        @csrf
                      @if ($count2 < 1)
                      <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>  
                              <a href="/setting-role/{{$user->id}}">
                                <button type="submit" class="btn btn-primary">
                                  Jadikan RW
                              </button>
                              </a>
                            </td>
                          @endif
                      @endforeach
                    </tr> 
                </tbody>
              </table>
        </div>
      </div>

    

</div>

@endsection
    