<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Auth;
class PetugasController extends Controller
{

    // Login
    public function login()
    {
        $title = "Petugas";
        return view('pages.login.petugas',compact('title'));
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('petugas')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else{
            return redirect()->back()->with('error','Username atau Password salah!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    // dashboard
    public function dashboard()
    {
        $title = "Dashboard";
        return view('pages.dashboard.admin',compact('title'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::paginate('10');
        $title = "Petugas";
        return view('pages.petugas.index',compact('petugas','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Petugas";
        return view('pages.petugas.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $petugas = new Petugas;
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level ;
        $petugas->password = bcrypt($request->password);
        $petugas->save();
        return redirect()->route('admin.petugas')->with('success','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $petugas = Petugas::find($id);
        $title = "Edit Petugas";
        return view('pages.petugas.edit',compact('petugas','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);
        $petugas->username = $request->username;
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level ;
        if ($request->password) {
            $petugas->password = bcrypt($request->password);
        }
        $petugas->update();
        return redirect()->route('admin.petugas')->with('success','berhasil update data');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->route('admin.petugas')->with('success','berhasil hapus data');

    }
}
