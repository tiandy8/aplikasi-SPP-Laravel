<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Auth;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(spp $spp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, spp $spp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(spp $spp)
    {
        //
    }

}
