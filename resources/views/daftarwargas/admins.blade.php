@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Daftar Warga
        </div>
        <div class="card-body">
          <table class="table table-responsive">
            <thead>
              <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($wargas as $warga)
                @php
                  $role = Illuminate\Support\Facades\DB::table('users')->where('id', $warga->id)->pluck('role')->first();
                  $countbendahara = Illuminate\Support\Facades\DB::table('users')->where('role', 4)->get();
                  $countbendahara1 = count($countbendahara);
                  $countsekretaris = Illuminate\Support\Facades\DB::table('users')->where('role', 5)->get();
                  $countsekretaris1 = count($countsekretaris);
                @endphp  
                <td>{{$loop->iteration}}</td>
                <td>{{$warga->name}}</td>
                <td>
                  <a href="/showprofil/{{$warga->id}}">
                    <button type="button" class="btn btn-primary">
                      <span data-feather="eye"></span>
                      Lihat Profil
                    </button>
                  </a>
                @if( $role !=5 && $countbendahara1 == 0 )
                  <a href="/updatebendahara/{{$warga->id}}">
                    <button type="button" class="btn btn-success">
                      <span data-feather="flag"></span>
                      Jadikan Bendahara
                    </button>
                  </a>
                @endif
                @if($role != 4 && $countsekretaris1 == 0 )
                <a href="/updatesekretaris/{{$warga->id}}">
                  <button type="button" class="btn btn-success">
                    <span data-feather="flag"></span>
                    Jadikan Sekretaris
                  </button>
                </a>
                @endif
                @if ($role == 5 && $countbendahara1 > 0 && $countbendahara1 <= 1) 
                  <a href="/updatebendahara/{{$warga->id}}">
                    <button type="button" class="btn btn-success">
                      <span data-feather="flag"></span>
                      Jadikan Bendahara
                    </button>
                  </a>
                @endif
                @if ($role == 4 && $countsekretaris1 > 0 && $countsekretaris1 <= 1)
                  <a href="/updatesekretaris/{{$warga->id}}">
                    <button type="button" class="btn btn-success">
                      <span data-feather="flag"></span>
                      Jadikan Sekretaris
                    </button>
                  </a>
                @endif

                @if ($role == 5 && $countbendahara1 > 0 && $countbendahara1 <= 1) 
                <a href="/updatebendahara/{{$warga->id}}">
                  <button type="button" class="btn btn-success">
                    <span data-feather="flag"></span>
                    Jadikan Bendahara
                  </button>
                </a>
              @endif
              @if ($role == 4 && $countsekretaris1 > 0 && $countsekretaris1 <= 1)
                <a href="/updatesekretaris/{{$warga->id}}">
                  <button type="button" class="btn btn-success">
                    <span data-feather="flag"></span>
                    Jadikan Sekretaris
                  </button>
                </a>
              @endif
              <a href="/jadikanwarga/{{$warga->id}}">
                <button type="button" class="btn btn-danger">
                  <span data-feather="eye"></span>
                  Jadikan Warga
                </button>
              </a>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
        </div>
      </div>

    

</div>

@endsection
    