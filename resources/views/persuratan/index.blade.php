@extends('layouts.main')
@section('container')
@inject('carbon', 'Carbon\Carbon')


<div class="row">
    <div class="card" >
      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if(session()->has('successDelete'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
        <div class="card-header bg-primary text-white p-3 mb-2 ">
          Pengajuan Surat Baru
        </div>
        <div class="card-body">
            <table class="table table-responsive table-bordered mt-4">
              <div class="col-md-6">
                <form action="/carisurat" method="GET">
                  <div class="input-group mb-2">
                    <input type="text" class="form-control" placeholder="Cari Surat..." name="searchsurat" value="{{request('searchsurat')}}">
                    <button class="btn bg-primary text-white" type="submit"  value="searchsurat">Cari</button>
                  </div>                
                </form>
              </div>
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Perihal</th> 
                        <th scope="col">Tgl Pengajuan</th>
                        <th scope="col">Keperluan</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($surat as $surats)
                        @if ($surats->status == 0)
                      <tr>
                        <th scope="row">        
                          {{ ($surat ->currentpage()-1) * $surat ->perpage() + $loop->index + 1 }}
                        </th>
                        <td>{{$surats->nama_pengirim}}</td>
                        <td>{{$surats->jenis_surat}}</td>
                        <td>
                          {{$surats->created_at}}</td>
                        <td>{{$surats->keperluan}}</td>
                        <td>
                          <a href="/lihatsurat/{{$surats->id}}">
                            <button type="submit" class="btn btn-primary">
                              Tampilkan Surat
                          </button>
                          </a>
                          <a href="/terbitkansurat/{{$surats->id}}">
                            <button type="submit" class="btn btn-primary">
                              Terbitkan Surat
                          </button>
                          </a>
                          <form action="/lihatsurat/{{$surats->id}}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button value="DELETE" type="button submit" class="d-inline btn btn-danger" onclick="return confirm('Yakin ingin me-reject surat ?')">
                              Reject Surat</button>
                          </form>
                        </td>
                      </tr>
                      @endif
                      @endforeach
                      {{$surat->links()}}
                </tbody>
            </table>
    </div>
</div>
<div class="card mt-5">
        <div class="card-header bg-warning text-white p-3 mb-2">
          Arsip Pengajuan Surat
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <form action="/carisuratapproved" method="GET">
                <div class="input-group mb-2">
                  <input type="text" class="form-control" placeholder="Cari Surat..." name="search" value="{{request('search')}}">
                  <button class="btn bg-primary text-white" type="submit"  value="CARI">Cari</button>
                </div>                
              </form>
            </div>
          </div>
          @include('persuratan.table', $approvedsurats)
          {{$approvedsurats->links()}}
        </div>
      </div>
</div>

@endsection
    