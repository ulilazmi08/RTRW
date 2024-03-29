<?php


namespace App\Http\Controllers;


use Carbon\Carbon;
use App\Models\Iuran;
use App\Models\BayarIuran;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IuranController extends Controller
{
    public function index()
    {
        $usernames = Auth::user()->name;
        $userscreated = DB::table('users')->where('name', $usernames)->pluck('created_at')->first();
        $laporanscreated = DB::table('iuran')->pluck('created_at');
        // dd($userscreated);
        // dd($laporanscreated);
        $bayariuran = BayarIuran::all();
        $iurans = Iuran::all();
        $countiuran = count($iurans);
        $countiuranbayar = count($bayariuran);
        $iurancompares = DB::table('iuran')->whereDate('created_at' ,'<=', $userscreated)->get();
        $bayariuranid =  DB::table('bayar_iuran')->pluck('id_iuran');
        $namapembayars =  DB::table('bayar_iuran')->pluck('nama_pembayar');
        return view('iuran.index', [
            'tittle' => 'Iuran Bulanan',
            'iurans' => $iurancompares,
            'listbayar' => $bayariuran,
            'username' => $usernames,
            'countiurans' => $countiuran,
            'countiuranbayars' => $countiuranbayar,
            'bayariuranids' => $bayariuranid,
            'namapembayar'=> $namapembayars,
            'usercreated' => $userscreated,
            'laporancreated' => $laporanscreated,
            // 'active' => 'login'
        ]);
    }
    public function buatiuran()
    {
        $user = User::all();
        $listbayar = BayarIuran::all();
        $iurans = Iuran::all();
        $idiurans = DB::table('iuran')->pluck('id');
        $countidiurans = count($idiurans);
        $countiuran = count($iurans);
        $bulan =  Carbon::now()->locale('id')->isoFormat('MMMM');
        $tahun =  Carbon::now()->locale('id')->isoFormat('Y');
        for ($i=0; $countidiurans < 0 ; $i++) { 
            $countidiurans == $i;
        }
        
        return view('iuran.create', [
            'tittle' => 'Iuran',
            'bulan' => $bulan,
            'tahun' => $tahun,
            'countiuran' => $countiuran,
            'iurans' => $iurans,
            'idiuran' => $idiurans,
            'listbayars' => $listbayar,
            'users' => $user,

        ]);
    }

    public function createiuran(Request $request)
    {
        $request->validate([
            'jenis_iuran' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);
        $data = $request->all();
        $iuran = new Iuran;
        $iuran->jenis_iuran = $data['jenis_iuran'];
        $iuran->bulan = $data['bulan'];
        $iuran->tahun = $data['tahun'];
        $iuran->save();
        return redirect('/buatiuran')->with('success', 'Iuran Baru Sudah Dibuat');
    }

    public function membayariuran($id)
    {
        $username = Auth::user()->name;
        $userid = Auth::user()->id;
        $profil = DB::table('profil')->where('user_id', $userid)->pluck('rt_id')->first();
        $iuranid = DB::table('iuran')->where('id', $id)->pluck('id')->first();
        $namaiuran = DB::table('iuran')->where('id', $id)->pluck('jenis_iuran')->first();
        $iuranbulan = DB::table('iuran')->where('id', $id)->pluck('bulan')->first();
        $iurantahun = DB::table('iuran')->where('id', $id)->pluck('tahun')->first();

        return view('iuran.bayar', [
            'tittle' => 'Iuran Bulanan',
            'iuranbulan' => $iuranbulan,
            'iurantahun' => $iurantahun,
            'namauser' => $username,
            'idiuran' => $iuranid,
            'userids' => $userid,
            'rt_pembayar' => $profil,
            'nama_iurans' => $namaiuran,
            // 'active' => 'login'
        ]);
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'bukti' => 'image|mimes:jpg,png|max:2048|nullable',
            'id_iuran' => 'nullable',
            'nama_pembayar' => 'nullable|max:255',
            'nama_iuran' => 'nullable|max:255',
            'nominal' => 'nullable|max:255',
            'via' => 'nullable|max:255',
            'status' => 'nullable',
        ]);
        $data = $request->all();
        $bayariuran = new BayarIuran;
        $bayariuran->nama_pembayar = $data['nama_pembayar'];
        $bayariuran->id_iuran = $data['id_iuran'];
        $bayariuran->nominal = $data['nominal'];
        $bayariuran->via = $data['via'];
        $bayariuran->status = 1;
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = \Carbon\Carbon::now()->format('d-m-Y') . '-' . $file->getClientOriginalName();
            $file->move(public_path('public/BuktiTransfer'), $filename);
            $data['image'] = $filename;
            $bayariuran->bukti = $filename;
            $bayariuran->save();
            // $id = Auth::user()->id;
            // $profil = Profil::where('user_   id', $id)->firstOrFail();
            // $profil->image_ktp = $filename;
            // $profil->save();
        }
        $bayariuran->save();    
        $keuangan = new Keuangan;
        $keuangan->nama_pembayar = $data['nama_pembayar'];
        $keuangan->rt_pembayar = $data['rt_pembayar'];
        $keuangan->nama_iuran = $data['nama_iuran'];
        $keuangan->jenis = "Pemasukan";
        $keuangan->nominal = $data['nominal'];
        $keuangan->via = $data['via'];
        $keuangan->save();
        return redirect('/iuran')->with('success', 'Ktp Sudah Diupload');
    }
}
