@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Setting Ketua RT
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama RT</th>
                        <th scope="col">Ketua</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($role == 1 || $role == 2)
                    @foreach ($rt as $rts)
                    @csrf
                      @php
                        $rubahrt = Illuminate\Support\Facades\DB::table('users')->where('role', 3)->get()
                        // foreach ($rubahrt as rubah) {
                        //   # code...
                        // };
                        // $definert = Illuminate\Support\Facades\DB::table('profil')->where('user_id', $rubahrt)->get();
                      @endphp
                      <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$rts->nama_rt}}</td>
                      <td>{{$rts->ketua_id}}</td>
                      <td>
                        @if ($rts->ketua_id == NULL)
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal1{{$rts->id}}">
                            Pilih Ketua RT
                          </button>
                        @endif
                        
                        @if ($rts->ketua_id != NULL)
                          <a href="/reset-ketuart/{{$rts->id}}/{{$rts->ketua_id}}">
                            <button type="submit" class="btn btn-primary">
                              Reset Ketua RT
                          </button>
                          </a>
                        @endif

                        <!-- Modal -->
                          <div class="modal fade" id="editModal1{{$rts->id}}" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">Nomor</th>
                                                <th scope="col">Nama Lengkap</th>
                                                <th scope="col">Aksi</th>
                                              </tr>
                                            </thead>
                                            <tbody>
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
                                            </tbody>
                                      </table>
                                </div>
                              </div>
                            </div>
                          </div>
                      </td>
                      @endforeach
                    @endif
                      </tr>
                      
                </tbody>
              </table>
        </div>
      </div>

    

</div>

@endsection
    