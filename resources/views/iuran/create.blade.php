@extends('layouts.main')
@section('container')

<script type="text/javascript">
  function showHideRow(row) {
      $("#" + row).toggle();
  }
</script>

<div class="row">
   <!-- Button trigger modal -->
   <div class="d-grid gap-2 d-md-block">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Buat Iuran
    </button>
   </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="/createiuran" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="jenis_iuran" class="form-label">Nomor KTP</label>
                <input type="text" class="form-control @error('jenis_iuran') is-invalid @enderror " id="jenis_iuran" aria-describedby="emailHelp" name="jenis_iuran" placeholder="Nama Iuran" required autofocus value="{{old('jenis_iuran')}}">
                      @error('jenis_iuran')
                      <div  class="invalid-feedback">
                        {{$message}}.
                      </div>
                      @enderror
                <input type="hidden" id="bulan" name="bulan" value="{{$bulan}}">
                <input type="hidden" id="tahun" name="tahun" value="{{$tahun}}">
            </div>          
        </div>
        <div class="modal-footer">
          <button type="button"class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
            Simpan
        </button>
        </div>
          </form>
      </div>
    </div>
  </div>
@if ($countiuran == 0)
        
  @else 
    @foreach ($iurans as $iuran)
        <div class="card mt-4">
          <div class="card-header bg-primary">
            {{$iuran->jenis_iuran}} Tahun {{$iuran->tahun}}
          </div>
          <div class="card-body">
            <table class="table table-bordered border-dark ">
              <thead>
                <tr class=" bg-warning">
                  <th scope="col">Data Warga Sudah Bayar</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-info">
                  <td>
                    <button scope="row" class="btn-primary" onclick="showHideRow('hidden_row');">
                      List Nama
                    </button>  
                  </td>
                </tr>
                <td class="bg-info transition: max-height 0.75s ease-in" id="hidden_row" class="hidden_row" colspan=4 >
                  @php
                  $namabayar = Illuminate\Support\Facades\DB::table('bayar_iuran')->where('id_iuran', $iuran->id)->pluck('nama_pembayar')->first();
                  @endphp
                  {{$namabayar}}
                </td>
                </td>
              </tbody>
            </table>
          </div>
        </div>
       
  @endforeach
        
@endif
</div>
@endsection
    