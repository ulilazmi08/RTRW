@extends('layouts.main')
@section('container')
    <div class="card">
        <div class="body">
            <a href="/cetaksurat/{{ $surat_pengirim->id }}" class="btn btn-primary">Save ke PDF</a>

			<div class="container" style="width: 695px;height: 942px; ">
				<p style="text-align: left">Kecamatan: Johar Baru</p>
				<p style="text-align: left">Kelurahan: Galur</p>
				<p class="koprt" style="text-align: left">RT {{ $surat_pengirim->rt_pengirim }} / RW 06 </p>
				<hr style="max-width: 200px; margin-left:0;line-height: 3px;  border-color: black">
	
				<center>
					<div class="col-md-10">
						<h2><u>SURAT PENGANTAR</u></h2>
						{{ $nomor }}
	
					</div>
				</center>
				<br><br>
				<p style="text-align: justify">Yang bertanda tangan dibawah ini, Pengurus <b> RT
						{{ $surat_pengirim->rt_pengirim }}. RW. 06 Kelurahan Galur Kota Jakarta Pusat </b>dengan ini
					menerangkan bahwa :</p>
				<center>
					<table table-responsive width="70%">
						<tbody>
							<tr>
								<td width="25%">Nama</td>
								<td width="5%">:</td>
								<td>{{ $surat_pengirim->nama_pengirim }}</td>
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
	
				<br><br>
				<div class="row" style="display:flex; width: 100%;  align-items: center; justify-content: center;">
					<div class="col" >
						<p style="text-align: left">
							Nomor: {{ $nomor }}
							<br>
							Tanggal : {{ $waktu }}
							<br>
							<b>Pengurus RW. 06 </b>
							<br>
							<br>
							<br>
							<br>
							<u>Ketua RW</u>
						</p>
					</div>
					<div class="col" >
						<p style="text-align: right">
							Jakarta, {{ $waktu }}<br>
							<b>Ketua RT {{ $surat_pengirim->rt_pengirim }} . RW. 06</b>
							<br>
							<br>
							
							<br>
							<br>
							<u>{{ $ketuart }}</u>
						</p>
					</div>
				</div>
			</div>
        </div>
    </div>
    </div>
@endsection
