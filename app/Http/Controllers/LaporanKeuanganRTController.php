<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Iuran;
use App\Models\BayarIuran;
use App\Models\User;
use App\Models\Keuangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanKeuanganRTController extends Controller
{
    public function index()
    {
        return view('home.keuangan_rt', [
            'tittle' => 'Dashboard | Keuangan RT',
            // 'active' => 'login'
        ]);
    }

    public function showdata (Request $request)
    {
        if ($request()->start_date || $request()->end_date) {
            $start_date = Carbon::parse($request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse($request()->end_date)->toDateTimeString();
            $data = Keuangan::whereBetween('created_at',[$start_date,$end_date])->get();
        } else {
            $data = Keuangan::latest()->get();
        }
        return redirect('/keuangan_rt',compact('data'));
    } 
}
