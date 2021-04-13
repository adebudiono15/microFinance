<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\JenisPengeluaran;
use App\Models\PengeluaranBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranBankController extends Controller
{

    private function _validation(Request $request)
    {
        $request->validate(
            [
                'tanggal' => 'required',
                'divisi' => 'required',
                'jenis_pengeluaran' => 'required',
                'jumlah_pengeluaran' => 'required',
                'bank' => 'required',
                'keterangan' => 'required',
            ],
            [
                'tanggal.required' => 'Tidak Boleh Kosong',
                'divisi.required' => 'Tidak Boleh Kosong',
                'jenis_pengeluaran.required' => 'Tidak Boleh Kosong',
                'jumlah_pengeluaran.required' => 'Tidak Boleh Kosong',
                'bank.required' => 'Tidak Boleh Kosong',
                'keterangan.required' => 'Tidak Boleh Kosong',
            ]
        );
    }

    public function index()
    {
        $user = Auth::user();
        $pengeluaran_bank = PengeluaranBank::where('divisi', $user->pengguna)->get();
        $jenis_pengeluaran = JenisPengeluaran::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $awal = date('Y-m-d');
        $akhir =  date('Y-m-d', strtotime('+1 days'));
        $tanggalsekarang =  date('Y-m-d', strtotime('+0 days'));
        $firstInvoiceID = PengeluaranBank::whereDay('created_at', date('d'))->count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%02d", $secondInvoiceID);
        return view('pengeluaran-bank.index', compact('pengeluaran_bank', 'jenis_pengeluaran', 'divisi', 'bank', 'kode', 'tanggalsekarang', 'awal', 'akhir'));
    }

    public function save(Request $request)
    {
        $this->_validation($request);
        try {
            $tanggal = $request->tanggal;
            $jenis_pengeluaran = $request->jenis_pengeluaran;
            $jumlah_pengeluaran_sementara = $request->jumlah_pengeluaran;
            $jumlah_pengeluaran = str_replace([".", "Rp", " "], '', $jumlah_pengeluaran_sementara);
            $keterangan = $request->keterangan;
            $bank = $request->bank;
            $divisi = $request->divisi;
            $kode_satu = $request->kode_satu;
            $kode_dua = $request->kode_dua;
            $kode_pengeluaran_bank =  $kode_satu . $kode_dua;

            PengeluaranBank::insert([
                'tanggal' => $tanggal,
                'jenis_pengeluaran' => $jenis_pengeluaran,
                'jumlah_pengeluaran' => $jumlah_pengeluaran,
                'keterangan' => $keterangan,
                'bank' => $bank,
                'divisi' => $divisi,
                'kode_pengeluaran_bank' => $kode_pengeluaran_bank,
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s'),
            ]);


            \Session()->flash('success');
            return redirect()->back();
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
    }

    public function detail($id)
    {
        $pengeluaran_bank = PengeluaranBank::find($id);
        return view('pengeluaran-bank.detail', compact('pengeluaran_bank'));
    }

    public function filter(Request $request)
    {
        $user = Auth::user();
        $jenis_pengeluaran = JenisPengeluaran::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $tanggalsekarang =  date('Y-m-d', strtotime('+0 days'));
        $firstInvoiceID = PengeluaranBank::whereDay('created_at', date('d'))->count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%02d", $secondInvoiceID);
        $awal = date('Y-m-d', strtotime($request->awal));
        $akhir = date('Y-m-d', strtotime($request->akhir));
        $pengeluaran_bank = PengeluaranBank::where('divisi', $user->pengguna)->whereDate('created_at', '>=', $awal)->whereDate('created_at', '<=', $akhir)->get();
        return view('pengeluaran-bank.filter', compact('pengeluaran_bank', 'awal', 'akhir', 'jenis_pengeluaran', 'divisi', 'bank', 'kode'));
    }
}
