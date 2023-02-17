@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <div class="card-header">
          Bayar Iuran Bulanan
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Bulan</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                @foreach ($iurans as $iuran)
                <tbody>
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$iuran->jenis_iuran}}</td>
                    <td>{{$iuran->tahun}}</td>
                    <td>
                      @php
                      $count = 0;
                      $countiuranid = -1;
                      @endphp 
                      @if ($countiuranbayars == 0 )
                          Belum Bayar
                      @endif
                      @for ($i = 0; $i < $countiuranbayars; $i++)
                           @if ($listbayar[$i]->id_iuran == $iuran->id && $namapembayar[$i] == $username)
                            Sudah Bayar
                            @else 
                              @php
                              $count++;
                              @endphp
                           @endif 
                          @if ($count == $countiuranbayars)
                          Belum Bayar 
                          @endif
                      @endfor
                    </td>
                  @if ($countiuranbayars == 0)
                    <td>                          
                      <a class="btn btn-primary" href="/bayariuran/{{$iuran->id}}">
                          Bayar Iuran
                      </a>
                    </td>
                  @endif
                    @php
                        $count1 = 0 ;
                        $countbayarid = -1;
                    @endphp

                  @for ($i = 0; $i < $countiuranbayars; $i++)
                      @if ($listbayar[$i]->id_iuran == $iuran->id && $namapembayar[$i] == $username)
                        <td>                          
                          <a class="btn btn-success" href="#">
                             <i data-feather="check"></i> 
                             Sudah Bayar
                          </a>
                        </td>
                      @else 
                        @php
                        $count1++;
                        @endphp
                      @endif 
                      @if ($count1 == $countiuranbayars)
                        <td>                          
                          <a href="/bayariuran/{{$iuran->id}}">
                            <button class="btn btn-primary">
                              Bayar Iuran
                          </button>
                          </a>
                        </td>
                      @endif
                      @endfor
                  </tr>           
                </tbody>
      @endforeach
              </table>
        </div>
      </div>
</div>
@endsection
    