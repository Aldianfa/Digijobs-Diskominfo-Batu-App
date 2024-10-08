<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\NewUser;
use App\Models\Bagian;
use Illuminate\Http\Request;

class NewUserController extends Controller
{
    public function index()
    {
        //join jabatan, bagian, dan user
        $pengguna = NewUser::all();
        $bagian = Bagian::all();
        // $pengguna = NewUser::join('bagians', 'new_users.id_bagian', '=', 'bagians.id_bagian')->get();
        return view('user.user', compact('pengguna'));

        // $pengguna = NewUser::all();
        // return view('user.user', compact('pengguna'));
    }

    public function create()
    {
        $pengguna = NewUser::all();
        $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        return view('user.add', compact('pengguna', 'bagian', 'jabatan'));
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
        // dd($validatedData);
        NewUser::create($validatedData);

        

        return redirect('/pegawai')->with('success', 'User berhasil ditambahkan!');

    }

    public function destroy(Request $request,$id)
    {
        // $pengguna = NewUser::findOrFail($pengguna->id);
        // $pengguna->delete();
        
        // if ($pengguna) {
        //     return redirect('/pegawai')->with(['success' => 'User berhasil dihapus!']);
        // } else {
        //     return redirect('/pegawai')->with(['error' => 'User gagal dihapus!']);
        // }
        $coba = NewUser::destroy($id);
        return redirect('/pegawai')->with('success', 'User berhasil dihapus!');
    }

    public function edit(Request $request, $id)
    {
        // $bagian = Bagian::all();
        $jabatan = Jabatan::all();
        $pengguna = NewUser::findOrFail($id);
        return view('user.edit', compact('pengguna', 'jabatan'));
        // return view('user.edit', ['pengguna' => $pengguna, 'bagian' => $bagian]);
    }

    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'nama' => 'required|max:255',
            'id_jabatan' => 'required',
            'kepegawaian' => 'required',
            'level' => 'required',
            'username' => 'required',
            'email' => 'required|email:dns|unique:new_users,email,'.$id,
            'no_hp' => 'required|digits_between:10,15',
            'password' => 'required|min:5|max:8'
        ]);
        $validatedData['password']=bcrypt($validatedData['password']);

        // dd($validatedData);
        
        NewUser::where('id', $id)
            ->update($validatedData);

        return redirect('/pegawai')->with('success', 'User berhasil diubah!');
    }

    public function show($id)
    {
        // join jabatan, bagian, dan user
        $pengguna = NewUser::find($id);
        
        $jabatan = Jabatan::all();
        $bagian = Bagian::all();
        // $bagian = Bagian::join('jabatans', 'bagians.id_jabatan', '=', 'jabatans.id_jabatan')->first();

        
        return view('user.detail', compact('pengguna'));


        // $pengguna = NewUser::findOrFail($id);
        // return view('user.detail', compact('pengguna'));
    }
   
}
