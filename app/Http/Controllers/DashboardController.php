<?php

namespace App\Http\Controllers;

use App\Models\PendapatanBank;
use App\Models\PendapatanTunai;
use App\Models\PengeluaranBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        // Pendapatan
        $pendapatan_bank = PendapatanBank::where('divisi', $user->pengguna)->whereMonth('created_at', date('m'))->sum('jumlah_pendapatan');
        $pendapatan_tunai = PendapatanTunai::where('divisi', $user->pengguna)->whereMonth('created_at', date('m'))->sum('jumlah_pendapatan');
        //    Pengeluaran
        $pengeluaran_bank = PengeluaranBank::where('divisi', $user->pengguna)->whereMonth('created_at', date('m'))->sum('jumlah_pengeluaran');
        return view('dashboard', compact(
            'pendapatan_bank',
            'pendapatan_tunai',
            'pengeluaran_bank'
        ));
    }
}
