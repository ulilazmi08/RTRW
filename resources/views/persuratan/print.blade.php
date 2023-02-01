<html>
<style>
 #main {
  width: 400px;
  height: 100px;
  border: 1px solid #c3c3c3;
  display: flex;
  justify-content: center;
}
    p.koprt {
        text-indent: 60px;
    }
    p.colorhurufstampel {
        color: #BA55D3	;
    }
   table.kopsurat {
  border: 1px solid;
  border-collapse: collapse;
  position:absolute;

}
table.kopsurat td{
            border: 1px solid #BA55D3;
            padding: 3px 2px;
            color: #BA55D3;
        }
        image.ttd {
    position:absolute;
    z-index:0;
}
        table.kopsurat th {
            border: 1px solid #BA55D3;
            padding: 3px 2px;
            color: #BA55D3;
        }
</style>
<div class="card">
    <div class="body">
        <div class="container" style="width:100%;height: 842px; ">
            <p style="text-indent: 20px; text-align: left">Kecamatan   : {{$kecamatan}}</p>
            <p style=" text-indent: 20px; text-align: left">Kelurahan   : {{$kelurahan}}</p>
            <p class="koprt" style="text-align: left">RT 0{{ $surat_pengirim->rt_pengirim }} / RW 0{{$nomorrw}} </p>
            <hr style="max-width: 230px; margin-left:0;line-height: 3px;  border-color: black">

            <center>
                <div class="col-md-10">
                    <h2><u>SURAT PENGANTAR</u></h2>
                    {{ $nomor }}

                </div>
            </center>
            <br><br>
            <p style="text-align: justify">Yang bertanda tangan dibawah ini, Pengurus <b> 
                RT. 0{{ $surat_pengirim->rt_pengirim }} RW. 0{{$nomorrw}} Kelurahan Galur Kota Jakarta Pusat </b>dengan ini
                menerangkan bahwa :</p>
            <center>
                <table style=" text-indent: 10px;" table-responsive width="75%" >
                    <tbody>
                        <tr>
                            <td width="35%">Nama</td>
                            <td width="12%">:</td>
                            <td>{{ $surat_pengirim->nama_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>No.KTP</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->no_ktp_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->jenis_kelamin_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl Lahir</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->tempat_lahir_pengirim }},
                                {{ Carbon\Carbon::parse($tgllahir)->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td>Pekerjaan</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->pekerjaan_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->kewarganegaraan_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Pendidikan</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->pendidikan_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->agama_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->alamat_pengirim }}</td>
                        </tr>
                        <tr>
                            <td>Maksud/Keperluan</td>
                            <td>:</td>
                            <td>{{ $surat_pengirim->keperluan }}</td>
                        </tr>
                    </tbody>
                </table>
            </center>

            <br><br><br><br>
            <div>
                <div class="col" style="float: left; width: 45%; height: 80%;">
                    <p style="text-align: left">
                        Nomor : {{ $nomor }}
                        <br>
                        Tanggal : {{ $waktu }}
                        <br>
                    </p>
                        <p  class="koprt" style="text-align: left ">
                            Pengurus RW. 0{{$nomorrw}} 
                        </p>
                    <p style="text-align: left">
                        {{-- <img class="ttd" src="{{public_path('img/ttdrw.png')}}" width="87px" height="100px"> --}}
                        <p style="text-align: left">
                        <table class="kopsurat">
                            <thead style="width:5cm; height:1cm; ">
                              <tr>
                                <th style=" font-size:25px" scope="col">RW. 0{{$nomorrw}}/3</th>
                                <th  style=" font-size:25px" scope="col">JP</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">Kelurahan Galur
                                    <br>
                                    Kecamatan Johar Baru
                                </th>
                                <td>71.08.1006</td>
                              </tr>
                            </tbody>
                          </table>
                        </p>
                         <img class="ttd" src="{{public_path('img/ttdrw.png')}}" width="87px" height="100px">
                         <br>
                        <br>
                        <u>{{ $ketuarw }}</u>
                    </p>
                </div>
				<div class="col" style="float: right; width: 45%; height: 80%;">
                    <p style="text-align: right">
                        Jakarta, {{ $waktu }}<br>
                        <b>Pengurus RT. 0{{ $surat_pengirim->rt_pengirim }} / RW. 0{{$nomorrw}}</b>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br><br>
                        <br>
                        <br>
                        <u>{{ $ketuart }}</u>
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</div>

</html>
