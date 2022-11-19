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
                  @php
                  $rolewarga = Illuminate\Support\Facades\DB::table('users')->where('role', '=', 6)->orWhere('role', '=', 5)->orWhere('role', '=', 4)->pluck('id');
                  if ($rolewarga->isEmpty()) {
                    $wargas = Illuminate\Support\Facades\DB::table('profil')->where('rt_id', '=', $no_rt)->where('user_id', '=', 99999999 )->get();
                  }else {
                    $wargas = collect();
                    for ($i = 0; $i < count($rolewarga); $i++)
                     {
                      $wargas1 = Illuminate\Support\Facades\DB::table('profil')->where('rt_id', '=', $no_rt)->where('user_id', '=', $rolewarga[$i])->get();
                      $wargas->push($wargas1[0]);  
                     }
                  }
                  @endphp
                    @foreach ($wargas as $warga) 
                      @php
                      $nama = Illuminate\Support\Facades\DB::table('users')->where('id', $warga->user_id)->pluck('name')->first();
                      $role = Illuminate\Support\Facades\DB::table('users')->where('id', $warga->user_id)->pluck('role')->first();
                      $countbendahara = Illuminate\Support\Facades\DB::table('users')->where('role', 4)->get();
                      $countbendahara1 = count($countbendahara);
                      $countsekretaris = Illuminate\Support\Facades\DB::table('users')->where('role', 5)->get();
                      $countsekretaris1 = count($countsekretaris);
                    @endphp  
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$nama}}</td>
                        <td>
                          <a href="/showprofil/{{$warga->user_id}}">
                            <button type="button" class="btn btn-primary">
                              <span data-feather="eye"></span>
                              Lihat Profil
                            </button>
                          </a>
                        @if( $role !=5 && $countbendahara1 == 0 )
                          <a href="/updatebendahara/{{$warga->user_id}}">
                            <button type="button" class="btn btn-success">
                              <span data-feather="flag"></span>
                              Jadikan Bendahara
                            </button>
                          </a>
                        @endif
                        @if($role != 4 && $countsekretaris1 == 0 )
                        <a href="/updatesekretaris/{{$warga->user_id}}">
                          <button type="button" class="btn btn-success">
                            <span data-feather="flag"></span>
                            Jadikan Sekretaris
                          </button>
                        </a>
                        @endif
                        @if ($role == 5 && $countbendahara1 > 0 && $countbendahara1 <= 1) 
                          <a href="/updatebendahara/{{$warga->user_id}}">
                            <button type="button" class="btn btn-success">
                              <span data-feather="flag"></span>
                              Jadikan Bendahara
                            </button>
                          </a>
                        @endif
                        @if ($role == 4 && $countsekretaris1 > 0 && $countsekretaris1 <= 1)
                          <a href="/updatesekretaris/{{$warga->user_id}}">
                            <button type="button" class="btn btn-success">
                              <span data-feather="flag"></span>
                              Jadikan Sekretaris
                            </button>
                          </a>
                        @endif

                        @if ($role == 5 && $countbendahara1 > 0 && $countbendahara1 <= 1) 
                        <a href="/updatebendahara/{{$warga->user_id}}">
                          <button type="button" class="btn btn-success">
                            <span data-feather="flag"></span>
                            Jadikan Bendahara
                          </button>
                        </a>
                      @endif
                      @if ($role == 4 && $countsekretaris1 > 0 && $countsekretaris1 <= 1)
                        <a href="/updatesekretaris/{{$warga->user_id}}">
                          <button type="button" class="btn btn-success">
                            <span data-feather="flag"></span>
                            Jadikan Sekretaris
                          </button>
                        </a>
                      @endif
                      <a href="/jadikanwarga/{{$warga->user_id}}">
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
    