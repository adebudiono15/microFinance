<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Divisi;
use App\Models\JenisPendapatan;
use App\Models\PendapatanBank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendapatanBankController extends Controller
{

    private function _validation(Request $request){
        $request->validate([
        'tanggal' => 'required',
        'divisi' => 'required',
        'jenis_pendapatan' => 'required',
        'jumlah_pendapatan' => 'required',
        'bank' => 'required',
        'keterangan' => 'required',
        ],
        [
        'tanggal.required' => 'Tidak Boleh Kosong',
        'divisi.required' => 'Tidak Boleh Kosong',
        'jenis_pendapatan.required' => 'Tidak Boleh Kosong',
        'jumlah_pendapatan.required' => 'Tidak Boleh Kosong',
        'bank.required' => 'Tidak Boleh Kosong',
        'keterangan.required' => 'Tidak Boleh Kosong',
        ]);
    }

    public function index (){
        $user = Auth::user();
        $pendapatan_bank = PendapatanBank::where('divisi', $user->pengguna)->latest()->get();
        $jenis_pendapatan = JenisPendapatan::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $awal = date('Y-m-d');
        $akhir =  date('Y-m-d', strtotime('+1 days'));
        $tanggalsekarang =  date('Y-m-d', strtotime('+0 days'));
        $firstInvoiceID = PendapatanBank::whereDay('created_at', date('d'))->count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%02d", $secondInvoiceID);
  
        return view('pendapatan-bank.index', compact('pendapatan_bank','jenis_pendapatan','divisi','bank','kode','tanggalsekarang','awal','akhir'));
     }

     public function save(Request $request)
   {
       $this->_validation($request);
       try {
        $tanggal = $request->tanggal;
        $jenis_pendapatan = $request->jenis_pendapatan;
        $jumlah_pendapatan_sementara = $request->jumlah_pendapatan;
        $jumlah_pendapatan = str_replace(["." , "Rp", " "], '', $jumlah_pendapatan_sementara);
        $keterangan = $request->keterangan;
        $bank = $request->bank;
        $divisi = $request->divisi;
        $kode_satu = $request->kode_satu;
        $kode_dua = $request->kode_dua;
        $kode_pendapatan_bank =  $kode_satu.$kode_dua;
        
        PendapatanBank::insert([
            'tanggal' => $tanggal,
            'jenis_pendapatan' => $jenis_pendapatan,
            'jumlah_pendapatan' => $jumlah_pendapatan,
            'keterangan' => $keterangan,
            'bank' => $bank,
            'divisi' => $divisi,
            'kode_pendapatan_bank' => $kode_pendapatan_bank,
            'created_at' =>date('y-m-d h:i:s'),
            'updated_at' =>date('y-m-d h:i:s'),
            ]);

            
        \Session()->flash('success');
        return redirect()->back();
        } catch (\Expetion $e) {
            \Session()->flash('gagal', $e->getMessage());
        }
   }

   public function detail($id)
    {
        $pendapatan_bank = PendapatanBank::find($id);
        return view('pendapatan-bank.detail', compact('pendapatan_bank'));
    }

    public function filter(Request $request){
        $user = Auth::user();
        $jenis_pendapatan = JenisPendapatan::get();
        $divisi = Divisi::get();
        $bank = Bank::get();
        $tanggalsekarang =  date('Y-m-d', strtotime('+0 days'));
        $firstInvoiceID = PendapatanBank::whereDay('created_at', date('d'))->count('id');
        $secondInvoiceID = $firstInvoiceID + 1;
        $kode = sprintf("%02d", $secondInvoiceID);
        $awal = date('Y-m-d', strtotime($request->awal));
        $akhir = date('Y-m-d', strtotime($request->akhir));

        $pendapatan_bank = PendapatanBank::where('divisi', $user->pengguna)->whereDate('created_at','>=', $awal)->whereDate('created_at','<=',$akhir)->get();
        return view('pendapatan-bank.filter', compact('pendapatan_bank','awal','akhir','jenis_pendapatan', 'divisi', 'bank','kode'));
    }
}
