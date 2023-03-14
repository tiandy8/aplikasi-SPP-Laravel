<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::paginate(10);
        $title ="SPP";
        return view('pages.spp.index',compact('spp','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title ="Create SPP";
        return view('pages.spp.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $spp = new Spp;
        $spp->nominal = $request->nominal;
        $spp->tahun = $request->tahun;
        $spp->save();

        return redirect()->route('admin.spp')->with('success','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = Spp::find($id);
        $title = "Edit SPP";
        return view('pages.spp.edit',compact('spp','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $spp = Spp::find($id);
        $spp->nominal = $request->nominal;
        $spp->tahun = $request->tahun;
        $spp->update();

        return redirect()->route('admin.spp')->with('success','berhasil mengupdate data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();
        return redirect()->route('admin.spp')->with('success','berhasil menghapus data');

    }
}
