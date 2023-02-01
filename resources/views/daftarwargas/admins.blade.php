@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Daftar Warga
        </div>
        <div class="me-autod-inline-block">
          <div class="input-group mt-4 mb-2">
            <form action="/cariwargarw" method="GET">
              <div class="input-group mb-2">
                <input type="text" class="form-control" placeholder="Cari Nama Warga" name="searchwarga" value="{{request('searchwarga')}}">
                <button class="btn bg-primary text-white" type="submit"  value="searchwarga">Cari</button>
              </div>                
            </form>
          </div>
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
                  $countbendahara = Illuminate\Support\Facades\DB::table('users')->where('role', 7)->get();
                  $countbendahararw = count($countbendahara);
                  $countsekretaris = Illuminate\Support\Facades\DB::table('users')->where('role', 8)->get();
                  $countsekretarisrw = count($countsekretaris);
                @endphp  
                <td>{{$loop->iteration}}</td>
                <td>{{$warga->name}}</td>
                <td>
                  <a href="/profilwarga/{{$warga->id}}">
                    <button type="button" class="btn btn-primary">
                      <span data-feather="eye"></span>
                      Lihat Profil
                    </button>
                  </a>
                  @if( $role !=7 && $role !=4 && $role !=5 && $countbendahararw == 0 )
                  <a href="/updatebendahararw/{{$warga->id}}">
                    <button type="button" class="btn btn-success">
                      <span data-feather="flag"></span>
                      Jadikan Bendahara RW
                    </button>
                  </a>
                @endif
                @if($role != 8 && $role !=4 && $role !=5 && $countsekretarisrw == 0 )
                <a href="/updatesekretarisrw/{{$warga->id}}">
                  <button type="button" class="btn btn-success">
                    <span data-feather="flag"></span>
                    Jadikan Sekretaris RW
                  </button>
                </a>
                @endif
                {{-- @if( $role !=5 && $countbendahara1 == 0 )
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
              @endif --}}
              @if ($role != 6 && $role !=5 && $role !=4)
              <a href="/jadikanwargarw/{{$warga->id}}">
                <button type="button" class="btn btn-warning">
                  <span data-feather="eye"></span>
                  Jadikan Warga
                </button>
              </a>
              @endif
                <form action="/deletewargarw/{{$warga->id}}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin menghapus warga ini ?')">
                    Hapus Warga</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            {{$wargas->links()}}

      </table>
        </div>
      </div>

    

</div>

@endsection
    