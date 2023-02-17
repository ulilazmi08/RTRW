<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RT;
use App\Models\Setting;
use App\Models\User;
use App\Models\Profil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->role;
        $no_rt = Profil::where('user_id', $id)->pluck('rt_id');
        $settingtempat = DB::table('setting_tempat')->where('id', 1)->get();
        $settingtempatid = DB::table('setting_tempat')->pluck('id');
        $countsetting = count($settingtempatid);
        if ($role != "1" ) {
            abort(403);
        }
        return view('setting.index', [
            'tittle' => 'Setting Sistem',
            'role' => $role,
            'tempat' => $settingtempat,
            'rt' => RT::all(),
            'no_rt' => $no_rt,
            'countsetting' =>$countsetting,
        ]);
    }

    public function simpansetting(Request $request)
    {
        $this->validate($request, [
            'rw' => 'required|max:10',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'kota' => 'required|max:255',
        ]);
        $data = $request->all();
        $setting = new Setting;
        $setting->rw = $data['rw'];
        $setting->kelurahan = $data['kelurahan'];
        $setting->kecamatan = $data['kecamatan'];
        $setting->provinsi = $data['provinsi'];
        $setting->kota = $data['kota'];
        $setting->save();
        return redirect('/setting')->with('success', 'Tempat sudah ditambah Sudah Diupdate');
    }
    public function updatetempat(Request $request, $id)
    {
        $this->validate($request, [
            'rw' => 'required|max:10',
            'kelurahan' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'provinsi' => 'required|max:255',
            'kota' => 'required|max:255',
        ]);
        $data = $request->all();
        $setting = Setting::find($id);
        $setting->rw = $data['rw'];
        $setting->kelurahan = $data['kelurahan'];
        $setting->kecamatan = $data['kecamatan'];
        $setting->provinsi = $data['provinsi'];
        $setting->kota = $data['kota'];
        $setting->save();
        return redirect('/setting')->with('success', 'Tempat Sudah Diupdate');
    }

        public function uploadlogo(Request $request)
    {
        $request->validate([
            'logorw' => 'image|mimes:jpg,png|max:2048',
        ]);
        $data = $request->all();
        if ($request->file('image')) {
            if ($request->oldLogo) {
                Storage::disk('public')->delete($request->oldLogo);
            }
            $file = $request->file('image');
            $filename = \Carbon\Carbon::now()->format('d-m-Y') . '-' . $file->getClientOriginalName();
            $file->move(public_path('public/Logo'), $filename);
            $data['image'] = $filename;
           
            $uploadlogo = Setting::where('id', 1)->firstOrFail();
            $uploadlogo->logo = $filename;
            $uploadlogo->save();
        }
        return redirect('/setting')->with('success', 'Logo Sudah Diupload');
    }
}
