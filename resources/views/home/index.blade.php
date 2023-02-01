@extends('layouts.main')
@section('container')
    <div class="row">
        <div class="card">
            <div class="card-header">
                Notifikasi
            </div>
            <div class="card-body">
                @forelse ($notifications as $notification)
                    <div class="alert alert-success" role="alert">
                        {{ $notification->data['name'] }}
                        <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                            Mark as read
                        </a>
                    </div>
                    @if ($loop->last)
                        <a href="#" id="mark-all">
                            Mark all read
                        </a>
                    @endif
                @empty
                    Tidak Ada Notif Baru
                @endforelse
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <h1 class="h2">Selamat Datang {{ auth()->user()->name }}
                    @if ($userrole == 3)
                        Ketua RT
                    @endif
                    @if ($userrole == 2)
                        Ketua RW 06
                    @endif
                </h1>

            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center">
                        <a href="#" class="text-decoration-none">
                            <div class="card white">
                                <div class="card-header bg-primary text-light">
                                    DASHBOARD
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="#" class="text-decoration-none">
                            <div class="card white">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    Ajukan Surat
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="/iuran" class="text-decoration-none">
                            <div class="card white">
                                <div class="card-header bg-primary text-light">
                                    Cek Iuran
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 text-center">
                        <a href="/profil" class="text-decoration-none">
                            <div class="card white">
                                <div class="card-header bg-primary text-light">
                                    Lihat Profil
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajukan Surat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="/buatsurat" class="mb-5" enctype="multipart/form-data">
                            @csrf
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Maksud/Keperluan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="mb-3">
                                                <label for="jenis_surat" class="form-label">Pilih</label>
                                                <select class="form-select" id="jenis_surat" name="jenis_surat">
                                                    <option selected>==Pilih Surat==</option>
                                                    <option value="Surat Pengantar KTP">Surat Pengantar KTP</option>
                                                    <option value="Surat Pengantar Kartu Keluarga">Surat Pengantar KK
                                                    </option>
                                                    <option value="Surat Pengantar Nikah">Surat Pengantar Nikah</option>
                                                    <option value="Surat Pengantar Keterangan Tidak Mampu">Surat Pengantar
                                                        Keterangan Tidak Mampu</option>
                                                    <option value="Surat Pengantar Keterangan Catatan Kepolisian">Surat
                                                        Pengantar Catatan Kepolisian</option>
                                                    <option value="Surat Pengantar Domisili Sementara">Surat Pengantar
                                                        Domisili Sementara</option>
                                                    <option value="Surat Pengantar Domisili">Surat Pengantar Domisili
                                                    </option>
                                                    <option value="Surat Pengantar Kematian">Surat Pengantar Laporan
                                                        Kematian</option>
                                                    <option value="Surat Pengantar Pindah">Surat Pengantar Pindah</option>
                                                    <option value="Surat Pengantar Pernyataan Perjanjian">Surat Pengantar
                                                        Pernyataan Perjanjian</option>
                                                    <option value="Surat Pengantar Kelahiran">Surat Pengantar Kelahiran
                                                    </option>
                                                    <option value="Surat Pengantar Jalan">Surat Pengantar Jalan
                                                    </option>
                                                    <option value="Surat Pengantar Izin Usaha">Surat Pengantar Izin Usaha
                                                    </option>
                                                </select>
                                            </div>
                                            <input type="hidden" id="nomor_surat" name="nomor_surat" value="">
                                            <input type="hidden" id="kewarganegaraan" name="kewarganegaraan"
                                                value="{{ $kewarganegaraan }}">
                                            <input type="hidden" id="pendidikan" name="pendidikan"
                                                value="{{ $pendidikan }}">
                                            <script type="text/javascript">
                                                document.getElementById("jenis_surat").oninput = function() {
                                                    var jenis_surat = document.getElementById("jenis_surat").value;

                                                    if (jenis_surat == "Surat Pengantar KTP") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ TP / {{ $countsuratktps }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Kartu Keluarga") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ KK / {{ $kks }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Nikah") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ NK / {{ $nikahs }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Keterangan Tidak Mampu") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ TM / {{ $tidakmampu }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Keterangan Catatan Kepolisian") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ KB / {{ $skck }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Domisili Sementara") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ DS / {{ $domisilisementara }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Domisili") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ NA / {{ $domisili }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Kematian") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ NT / {{ $kematian }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Pindah") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ PN / {{ $pindah }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Pernyataan Perjanjian") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ UM / {{ $perjanjian }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Kelahiran") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ AL / {{ $kelahiran }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Surat Pengantar Jalan") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ UM / {{ $izinusaha }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (jenis_surat == "Surat Pengantar Izin Usaha") {
                                                        document.getElementById("nomor_surat").value =
                                                            "No. {{ $nomorsurat }} RT. {{ $rt }} / {{ $bulan }} / {{ $tahun }}/ UM / {{ $jalan }}";
                                                        // console.log(document.getElementById("nomor_surat").value);
                                                    }
                                                    if (result != 0) {
                                                        document.getElementById("peran_keluarga").disabled = false;
                                                    }

                                                }
                                            </script>
                                        </th>
                                        <td>
                                            <div class="mb-3">
                                                <label for="keperluan" class="form-label">Keperluan</label>
                                                <input type="text"
                                                    class="form-control @error('keperluan') is-invalid @enderror "
                                                    id="keperluan" aria-describedby="emailHelp" name="keperluan"
                                                    placeholder="Contoh : Membuat Surat ...* " required autofocus
                                                    value="{{ old('keperluan') }}">
                                                @error('keperluan')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}.
                                                    </div>
                                                @enderror
                                                <input type="hidden" id="no_ktp_pengirim" name="no_ktp_pengirim"
                                                    value="{{ $noktp }}">

                                                @foreach ($profils as $profil)
                                                    <input type="hidden" id="nama_pengirim" name="nama_pengirim"
                                                        value="{{ $nama }}">
                                                    <input type="hidden" id="tgl_lahir_pengirim"
                                                        name="tgl_lahir_pengirim" value="{{ $profil->tgl_lahir }}">
                                                    <input type="hidden" id="agama_pengirim" name="agama_pengirim"
                                                        value="{{ $profil->agama }}">
                                                    <input type="hidden" id="jenis_kelamin_pengirim"
                                                        name="jenis_kelamin_pengirim" value="{{ $profil->gender }}">
                                                    <input type="hidden" id="pekerjaan_pengirim"
                                                        name="pekerjaan_pengirim" value="{{ $profil->pekerjaan }}">
                                                    <input type="hidden" id="alamat_pengirim" name="alamat_pengirim"
                                                        value="{{ $profil->alamat }}">
                                                    <input type="hidden" id="rt_pengirim" name="rt_pengirim"
                                                        value="{{ $profil->rt_id }}">
                                                    <input type="hidden" id="tempat_lahir" name="tempat_lahir"
                                                        value="{{ $profil->tempat_lahir }}">
                                                @endforeach
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Ajukan Surat
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            console.log('ready');

            function sendMarkRequest(id = null) {
                return $.ajax("{{ route('markNotification') }}", {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    data: {
                        id
                    }
                });
            }
            $(function() {
                $('.mark-as-read').click(function() {
                    let request = sendMarkRequest($(this).data('id'));
                    request.done(() => {
                        $(this).parents('div.alert').remove();
                    });
                });
                $('#mark-all').click(function() {
                    let request = sendMarkRequest();
                    request.done(() => {
                        $('div.alert').remove();
                    })
                });
            });
        });
    </script>
@endsection
