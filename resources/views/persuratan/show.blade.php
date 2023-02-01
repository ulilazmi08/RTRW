<section class="content">
	<div class="container-fluid">
        	<div class="card">
	<div class="body">
		<a href="http://dprompt.id/rtrw/index.php/Panel_rt/simpan_surat/29" class="btn btn-primary">Save ke PDF</a>
			
		<div class="container" style="width: 595px;height: 842px; ">
			<center>
				<div class="col-md-2"><img src="/img/gambartest.png" width="87px" height="100px"></div>
				<div class="col-md-10">
					<h3>{{$surat_pengirim->rt_pengirim}} . RW. 06</h3>
				<h5>Kelurahan Galur Kota Jakarta Pusat Kabupaten DKI Jakarta</h5>
				<hr style="line-height: 3px; border-color: black">
				<h4><u>SURAT KETERANGAN</u></h4>
				No. RT. 15/Metland/2022/V/1				</div>
				
			</center><br><br>
				<p style="text-align: justify">Yang bertanda tangan dibawah ini <b>{{$surat_pengirim->rt_pengirim}}. 15 RW. 06 Kelurahan Galur  Kota Jakarta Pusat </b>dengan ini menerangkan bahwa :</p>
				<center>
			<table width="70%">
				<tbody><tr>
					<td width="25%">Nama</td>
					<td width="5%">:</td>
					<td>{{$surat_pengirim->nama_pengirim}}</td>
				</tr>
				<tr>
					<td>Tgl. Lahir</td>
					<td>:</td>
					<td>{{$surat_pengirim->tgl_lahir_pengirim}}</td>
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
			</tbody></table>
			</center><br><br>
			<p style="text-align: justify">
				Orang tersebut diatas, adalah <b>benar-benar warga kami dan berdomisili di RT. 15 RW. 06 Kelurahan Galur Kecamatan  Johar Baru. </b>Surat Keterangan ini dibuat sebagai kelengkapan pengurusan <b>Membuat KTP</b>.
			</p>
			<br>
			<p style="text-align: justify">
				Demikian surat keterangan ini kami buat, untuk dapat dipergunakan sebagaimana mestinya.
			</p>
			<br>
			<br>
			<br>
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
            

        
    </section>