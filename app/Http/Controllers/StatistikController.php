<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;


class StatistikController extends Controller
{
   

    public function statistik()
    {
        //jenis kelamin
        $lakilakianggota = DB::table('anggota_keluarga')->where('gender', 'like', 'Laki Laki')->get();
        $perempuananggota = DB::table('anggota_keluarga')->where('gender', 'like', 'Perempuan')->get();
        $kk = DB::table('users')->where('role_keluarga', '=', 1)->pluck('no_keluarga');
        $countkk = count($kk);
        // $countlakilakianggota = count($lakilakianggota);
        // $countperempuananggota = count($perempuananggota);
        $lakilaki = DB::table('profil')->where('gender', 'like', 'Laki Laki')->get();
        $perempuan = DB::table('profil')->where('gender', 'like', 'Perempuan')->get();
        $countlakilaki = count($lakilaki)+count($lakilakianggota);
        $countperempuan = count($perempuan)+count($perempuananggota);

      
        //pendidikan
        $belumsekolah = DB::table('profil')->where('pendidikan', 'like', 'Belum Sekolah')->get();
        $sd = DB::table('profil')->where('pendidikan', 'like', 'SD')->get();
        $smp = DB::table('profil')->where('pendidikan', 'like', 'SMP')->get();
        $sma = DB::table('profil')->where('pendidikan', 'like', 'SMA')->get();
        $s1 = DB::table('profil')->where('pendidikan', 'like', 'S1')->get();
        $s2 = DB::table('profil')->where('pendidikan', 'like', 'S2')->get();
        $s3 = DB::table('profil')->where('pendidikan', 'like', 'S3')->get();
        $belumsekolahanggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'Belum Sekolah')->get();
        $sdanggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'SD')->get();
        $smpanggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'SMP')->get();
        $smaanggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'SMA')->get();
        $s1anggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'S1')->get();
        $s2anggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'S2')->get();
        $s3anggota = DB::table('anggota_keluarga')->where('pendidikan', 'like', 'S3')->get();
        $countbelumsekolah = count($belumsekolah)+count($belumsekolahanggota);
        $countsd = count($sd)+count($sdanggota);
        $countsmp = count($smp)+count($smpanggota);
        $countsma = count($sma)+count($smaanggota);
        $counts1 = count($s1)+count($s1anggota);
        $counts2 = count($s2)+count($s2anggota);
        $counts3 = count($s3)+count($s3anggota);
        //agama

        $islam = DB::table('profil')->where('agama', 'like', 'Islam')->get();
        $hindu = DB::table('profil')->where('agama', 'like', 'Hindu')->get();
        $budha = DB::table('profil')->where('agama', 'like', 'Budha')->get();
        $protestan = DB::table('profil')->where('agama', 'like', 'Protestan')->get();
        $katolik = DB::table('profil')->where('agama', 'like', 'Katolik')->get();
        $konghucu = DB::table('profil')->where('agama', 'like', 'Konghucu')->get();
        $islamanggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Islam')->get();
        $hinduanggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Hindu')->get();
        $budhaanggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Budha')->get();
        $protestananggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Protestan')->get();
        $katolikanggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Katolik')->get();
        $konghucuanggota = DB::table('anggota_keluarga')->where('agama', 'like', 'Konghucu')->get();
        $countislam = count($islam)+count($islamanggota);
        $counthindu = count($hindu)+count($hinduanggota);
        $countbudha = count($budha)+count($budhaanggota);
        $countkatolik = count($katolik)+count($katolikanggota);
        $countprotestan = count($protestan)+count($protestananggota);
        $countkonghucu = count($konghucu)+count($konghucuanggota);
        //pekerjaan

        $pns = DB::table('profil')->where('pekerjaan', 'like', 'PNS')->get();
        $militer = DB::table('profil')->where('pekerjaan', 'like', 'Militer')->get();
        $polisi = DB::table('profil')->where('pekerjaan', 'like', 'Polisi')->get();
        $dokter = DB::table('profil')->where('pekerjaan', 'like', 'Dokter')->get();
        $akademisi = DB::table('profil')->where('pekerjaan', 'like', 'Akademisi')->get();
        $karyawanswasta = DB::table('profil')->where('pekerjaan', 'like', 'Karyawan Swasta')->get();
        $pedagang = DB::table('profil')->where('pekerjaan', 'like', 'Pedagang')->get();
        $belumkerja = DB::table('profil')->where('pekerjaan', 'like', 'Tidak Bekerja')->get();
        $wiraswasta = DB::table('profil')->where('pekerjaan', 'like', 'Wiraswasta')->get();
        $pnsanggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'PNS')->get();
        $militeranggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Militer')->get();
        $pedaganganggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Pedagang')->get();
        $polisianggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Polisi')->get();
        $dokteranggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Dokter')->get();
        $akademisianggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Akademisi')->get();
        $karyawanswastaanggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Karyawan Swasta')->get();
        $belumkerjaanggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Belum Bekerja')->get();
        $wiraswastaanggota = DB::table('anggota_keluarga')->where('pekerjaan', 'like', 'Wiraswasta')->get();
        $countpns = count($pns)+count($pnsanggota);
        $countbelumbekerja = count($belumkerja)+count($belumkerjaanggota);
        $countpedagang = count($pedagang)+count($pedaganganggota);
        $countmiliter = count($militer)+count($militeranggota);
        $countpolisi = count($polisi)+count($polisianggota);
        $countdokter = count($dokter)+count($dokteranggota);
        $countakademisi = count($akademisi)+count($akademisianggota);
        $countkaryawanswasta = count($karyawanswasta)+count($karyawanswastaanggota);
        $countwiraswasta = count($wiraswasta)+count($wiraswastaanggota);

        //tgl lahir
        $date = DB::table('profil')->pluck('tgl_lahir');
        $dateanggota = DB::table('anggota_keluarga')->pluck('tgl_lahir');
        $arraydate = [];
        $countlenght = count($date);
        for ($i = 0; $i < $countlenght; $i++) {
            $date1 = Carbon::parse($date[$i]);
            $now = Carbon::now();
            $diff = $date1->diffInYears($now);
            array_push($arraydate, $diff);
        }
        $countlenghtanggota = count($dateanggota);
        for ($i = 0; $i < $countlenghtanggota; $i++) {
            $date2 = Carbon::parse($dateanggota[$i]);
            $now = Carbon::now();
            $diff = $date2->diffInYears($now);
            array_push($arraydate, $diff);
        }

        //umur 1 0-5
        $countumur = count($arraydate);
        $umur05 = [];
        $umur611 = [];
        $umur1217 = [];
        $umur1825 = [];
        $umur2635 = [];
        $umur3649 = [];
        $umur50 = [];
        for ($i = 0; $i < $countumur; $i++) {
            if ($arraydate[$i] <= 5) {
                array_push($umur05, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 6 && $arraydate[$i] <= 11) {
                array_push($umur611, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 12 && $arraydate[$i] <= 17) {
                array_push($umur1217, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 18 && $arraydate[$i] <= 25) {
                array_push($umur1825, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 26 && $arraydate[$i] <= 35) {
                array_push($umur2635, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 36 && $arraydate[$i] <= 49) {
                array_push($umur3649, $arraydate[$i]);
            }
            if ($arraydate[$i]  >= 50) {
                array_push($umur50, $arraydate[$i]);
            }
        }
        $countumur05 = count($umur05);
        $countumur611 = count($umur611);
        $countumur1217 = count($umur1217);
        $countumur1825 = count($umur1825);
        $countumur2635 = count($umur2635);
        $countumur3649 = count($umur3649);
        $countumur50 = count($umur50);


        return view('statistik.index', [
            'tittle' => 'Dashboard | Statistik Warga',
            'pria' => $countlakilaki,
            'perempuan' => $countperempuan,
            //pendidikan
            'belumsekolah' => $countbelumsekolah,
            'sd' => $countsd,
            'smp' => $countsmp,
            'sma' => $countsma,
            's1' => $counts1,
            's2' => $counts2,
            's3' => $counts3,
            //agama
            'islam' => $countislam,
            'hindu' => $counthindu,
            'budha' => $countbudha,
            'protestan' => $countprotestan,
            'katolik' => $countkatolik,
            'konghucu' => $countkonghucu,
            //pekerjaan
            'pns' => $countpns,
            'militer' => $countmiliter,
            'polisi' => $countpolisi,
            'dokter' => $countdokter,
            'akademisi' => $countakademisi,
            'karyawanswasta' => $countkaryawanswasta,
            'wiraswasta' => $countwiraswasta,
            'belumbekerja' => $countbelumbekerja,
            'pedagang' => $countpedagang,
            'jumlahkk' =>$countkk,
            //Umur
            'umur05' =>  $countumur05,
            'umur611' => $countumur611,
            'umur1217' => $countumur1217,
            'umur1825' => $countumur1825,
            'umur2635' => $countumur2635,
            'umur3649' => $countumur3649,
            'umur50' => $countumur50,

            // 'active' => 'login'
        ]);
    }
}
