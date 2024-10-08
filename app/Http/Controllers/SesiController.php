<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\LogKegiatan;
use App\Models\NewUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function pejabatPage(){
        return view('user.dashboard');
    }

    function userPage(){
        return view('user.dashboard');
    }

    function userdashboard(){
        $kegiatan = Kegiatan::all();
        $logkegiatan = LogKegiatan::all();
        //merge kegiatan dan logkegiatan
        $allkegiatan = $kegiatan->merge($logkegiatan); 

        return view('user.dashboard', compact('allkegiatan'));
    }

    function awal(Request $request)
    {
        return view('index');
    }

    function index(Request $request)
    {
        return view('login');
    }

    function login(Request $request)
    {

        // PROSES VALIDASI
        $infoLogin = $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);
        
        if (Auth::attempt($infoLogin)) {
            
            //where('email', $request->email)->first();
           $datauser =  NewUser::where('email', $request->email)->first();
           $id_jabatan = $datauser->id_jabatan;
           $request->session()->put('id_jabatan', $id_jabatan);
        
            if (Auth::user()->level == 'admin') {
                return redirect()->intended('admin');
            } elseif (Auth::user()->level == 'user') {
                return redirect()->intended('kegiatan');
            } else {
                return redirect()->intended('userdashboard');
            }

        } 

        return back()->with('LoginGagal', 'Email atau password salah!');
        
        
    }

    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
