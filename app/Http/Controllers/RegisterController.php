<?php

namespace App\Http\Controllers;

use App\Models\SubBagian;
use App\Models\Bagian;
use App\Models\Jabatan;
use App\Models\NewUser;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all();
        $bagian = Bagian::all();
        return view('register', compact('bagian', 'jabatan'));
    }

    public function store(Request $request)
    {

        $validatedData=$request->validate([
            'nama' => 'required|max:255',
            'id_jabatan' => 'required',
            'kepegawaian' => 'required',
            'level' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns|unique:new_users,email',
            'no_hp' => 'required|digits_between:10,15',
            'password' => 'required|min:5|max:8'
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);
        
        NewUser::create($validatedData);

        

        return redirect('/login')->with('success', 'Registrasi Berhasil! User berhasil ditambahkan!');

    }

    public function subbagiandropdown(Request $request)
    {
        $bagian = Bagian::findOrFail($request->id_bagian);
        $subbagianFiltered = $bagian->subbagians->pluck('nama_sub_bagian', 'id_sub_bagian');
        return response()->json($subbagianFiltered);
    }

    public function jabatandropdown(Request $request)
    {
        $subbagian = SubBagian::findOrFail($request->id_sub_bagian);
        $jabatanFiltered = $subbagian->jabatans->pluck('nama_jabatan', 'id_jabatan');
        return response()->json($jabatanFiltered);
    }
}
