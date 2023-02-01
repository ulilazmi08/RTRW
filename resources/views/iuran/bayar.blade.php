@extends('layouts.main')
@section('container')

<div class="row">
    <div class="card">
        <div class="card-header">
          Pembayar Iuran Bulan {{$iuranbulan}} Tahun {{$iurantahun}}
        </div>
        <div class="card-body">
            <form method="POST" action="/bayariuran1/pembayaran/iuran" enctype="multipart/form-data">
                @csrf
                <div class="md-3">
                    Nominal
                    <input required type="nominal" class="form-control @error('nominal') is-invalid @enderror " id="nominal" name="nominal" placeholder="Nominal">
                </div>
                <div class="mb-3">
                    <label for="via" class="form-label">Metode Pembayaran</label>
                    <select id="via" class="form-select" name="via">
                      <option selected>--Pilih Metode Bayar--</option>
                        <option value="Cash">Cash</option>
                        <option value="Transfer">Transfer</option>
                    </select>
                </div>
                <div class="mb-3">
                  <label for="bukti" class="form-label">Default file input example</label>
                  <img class="img-preview img-fluid">
                  <input type="file" id="bukti" class="form-control" name="image" onchange="previewImage()">
                  {{-- <input required name="image" class="form-control" type="file" id="bukti" name="bukti"> --}}
                </div>
                <input type="hidden" id="nama_iuran" name="nama_iuran" value="{{$nama_iurans}}">
                <input type="hidden" id="rt_pembayar" name="rt_pembayar" value="{{$rt_pembayar}}">
                <input type="hidden" id="id_iuran" name="id_iuran" value="{{$idiuran}}">
                <input type="hidden" id="jenis" name="jenis" value="Pemasukan">
                <input type="hidden" id="nama_pembayar" name="nama_pembayar" value="{{$namauser}}">
                <button type="submit" class="btn btn-primary">
                    Bayar
                </button>  
                
                <script type="text/javascript">
                  
                  document.getElementById("via").oninput = function(){  
                    var via = document.getElementById("via").value;

                  
                  var bukti = document.getElementById("bukti").value; 
                  var result = via.localeCompare("Cash")
                  //var enable = document.getElementById("bukti");
                  //alert(result);
                  if (result == 0) {
                    document.getElementById("bukti").disabled=true;
                  }
                  if (result != 0) {
                    document.getElementById("bukti").disabled=false;
                  }
                  
                   }
                 
                
                </script>                  
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage() 
    {
    const image = document.querySelector('#bukti');
    const imgPreview = document.querySelector('.img-preview');
  
    imgPreview.style.display = 'block';
  
    const oFReader = new FileReader ();
    oFReader.readAsDataURL(image.files[0]);
      oFReader.onload = function (oFREvent) 
      {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
    