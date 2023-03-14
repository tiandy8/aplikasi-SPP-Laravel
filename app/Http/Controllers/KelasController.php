<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::paginate('10');
        $title = "Kelas";
        return view('pages.kelas.index',compact('title','kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Kelas Create";
        return view('pages.kelas.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();
        return redirect()->route('admin.kelas')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        $title = "Kelas Edit";
        return view('pages.kelas.edit',compact('title','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->update();
        return redirect()->route('admin.kelas')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}
