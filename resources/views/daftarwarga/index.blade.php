@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Setting Role Warga
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nomor</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rt as $rts)
              @php
              $warga = Illuminate\Support\Facades\DB::table('profil')->where('rt_id', $rts->nama_rt)->get();
              @endphp
                @foreach ($warga as $wargas) 
                  @php
                  $nama = Illuminate\Support\Facades\DB::table('users')->where('id', $wargas->user_id)->pluck('name')->first();
                  @endphp  
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{$nama}}</td>
                  <td>
                    <a href="/setting-ketuart/{{$wargas->user_id}}/{{$wargas->rt_id}}">
                      <button type="submit" class="btn btn-primary">
                        Jadikan RT
                    </button>
                    </a>
                  </td>
                </tr>
                @endforeach
              @endforeach
            </tbody>
      </table>
      
        </div>
      </div>

    

</div>

@endsection
    