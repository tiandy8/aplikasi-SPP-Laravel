<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    // Login
    public function login()
    {
        $title = "Siswa";
        return view('pages.login.siswa',compact('title'));
    }
    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'nisn' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('siswa.dashboard');
        } else{
            return redirect()->back()->with('error','NISN atau Password salah!');
        }

    }
    // dashboard
    public function dashboard()
    {
        $title = "Dashboard";
        return view('pages.dashboard.siswa',compact('title'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Siswa";
        $siswa = Siswa::paginate('10');
        return view('pages.siswa.index',compact('title','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::get();
        $title = "Siswa Create";
        return view('pages.siswa.create',compact('title','kelas'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $siswa = new Siswa;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->password = bcrypt($request->password);
        $siswa->save();

        return redirect()->route('admin.siswa')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::get();
        $siswa = Siswa::find($id);
        $title = "Siswa Edit";
        return view('pages.siswa.edit',compact('title','siswa','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $siswa = Siswa::find($id);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        if ($request->password) {
            $siswa->password = bcrypt($request->password);
        }
        $siswa->update();

        return redirect()->route('admin.siswa')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return back()->with('success','Data berhasil dihapus');
    }

}
