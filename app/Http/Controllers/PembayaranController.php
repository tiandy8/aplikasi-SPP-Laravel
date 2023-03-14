<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::paginate('10');
        $title = "Laporan";
        return view('pages.laporan.index',compact('pembayaran','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::get();
        $spp = Spp::get();
        $title = "Create Laporan";
        return view('pages.laporan.create',compact('title','spp','siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pembayaran = new Pembayaran;
        $pembayaran->id_petugas = Auth::id();
        $pembayaran->nisn = $request->nisn;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->bulan_bayar = $request->bulan_bayar;
        $pembayaran->tahun_dibayar = $request->tahun_dibayar;
        $pembayaran->id_spp = $request->id_spp;
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->save();
        return redirect()->route('admin.laporan')->with('success','Berhasil menambahkan data');
    }

    public function cetak()
    {
        $pembayaran = Pembayaran::orderBy('tgl_bayar','asc')->get();
        return view('pages.laporan.cetak',compact('pembayaran'));
    }

    public function cetakSiswa($id)
    {
        $siswa = Siswa::find($id);
        $pembayaran = Pembayaran::where('nisn',$id)->get();
        return view('pages.laporan.cetak-siswa',compact('pembayaran','siswa'));

    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $pembayaran = Pembayaran::where('nisn',$id)->get();
        $title = "History Siswa";
        return view('pages.laporan.history',compact('siswa','pembayaran','title'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();
        return redirect()->route('admin.laporan')->with('success','Berhasil hapus data');
    }
}
