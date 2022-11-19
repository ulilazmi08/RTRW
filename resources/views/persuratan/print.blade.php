<html>
	<style>
		#print {
		  border: 1px solid black;
		  border-collapse: collapse;
		  
		}
		</style>
<div class="card">
	<div class="body">			
		<div class="container" style="width: 100%;height: 842px; ">
			<center>
				<div class="col-md-2"><img src="{{public_path('img/gambartest.png')}}" width="87px" height="100px"></div>
				<div class="col-md-10">
					<h3>{{$surat_pengirim->rt_pengirim}} . RW. 06</h3>
				<h5>Kelurahan Galur Kota Jakarta Pusat Kabupaten DKI Jakarta</h5>
				<hr style="line-height: 3px; border-color: black">
				<h4><u>SURAT KETERANGAN</u></h4>
				No. RT. 08/RW 06/2022/V/1	
		</div>
				</center>
				<br><br>
				<p style="text-align: justify">Yang bertanda tangan dibawah ini <b>{{$surat_pengirim->rt_pengirim}}. 15 RW. 06 Kelurahan Galur  Kota Jakarta Pusat </b>dengan ini menerangkan bahwa :</p>
			<center>
				<table table-responsive width="70%">
					<tbody><tr>
						<td width="25%">Nama</td>
						<td width="5%">:</td>
						<td>{{$surat_pengirim->nama_pengirim}}</td>
					</tr>
					<tr>
						<td>Tanggal. Lahir</td>
						<td>:</td>
						<td>{{Carbon\Carbon::parse($tgllahir)->format('d-m-Y')}}</td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td>:</td>
						<td>{{$surat_pengirim->jenis_kelamin_pengirim}}</td>
					</tr>
					<tr>
						<td>Pekerjaan</td>
						<td>:</td>
						<td>{{$surat_pengirim->pekerjaan_pengirim}}</td>
					</tr>
					<tr>
						<td>Agama</td>
						<td>:</td>
						<td>{{$surat_pengirim->agama_pengirim}}</td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>:</td>
						<td>{{$surat_pengirim->alamat_pengirim}}</td>
					</tr>
				</tbody>
			</table>
			</center>
			
			<br><br>
			<p style="text-align: justify">
				Orang tersebut diatas, adalah <b>benar-benar warga kami dan berdomisili di RT. 15 RW. 06 Kelurahan Galur Kecamatan  Johar Baru. </b>Surat Keterangan ini dibuat sebagai kelengkapan pengurusan <b>Membuat KTP</b>.
			</p>
			<br>
			<p style="text-align: justify">
				Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
			</p>
			<br>	

			<div class="row">
				{{-- <div class="col">
				 <table  width="5cm" height="2cm" class="table" id="print" style="border-collapse: collapse;">
					<tbody>
						<tr>
						  <td id="print">Mark</td>
						  <td id="print">Otto</td>
						</tr>
						<tr>
						  <td id="print">Jacob</td>
						  <td id="print">Thornton</td>
						  
						</tr>
					  </tbody>
				 </table>
				</div> --}}
				<div class="col">
					<p style="text-align: right">
						Jakarta, {{$waktu}}<br>
						<b>Ketua {{$surat_pengirim->rt_pengirim}} .   RW. 06</b>
						<br>
						<br>
						<br>
						<br>
						<u>{{$ketuart}}</u>
					</p>
				</div>
			</div>
			
			
		</div>
	</div>
		</div>
	</div>
	</html>