<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use App\Models\NewUser;
use App\Models\Skpd;
use App\Models\Surat;
use App\Models\SubKlasifikasi;
use Illuminate\Http\Request;

class AdminSuratController extends Controller
{
    public function index()
    {
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $subklasifikasi = SubKlasifikasi::all();
        $surat = Surat::all();

        return view('admin.surat', compact('surat', 'subklasifikasi', 'user', 'klasifikasi'));
    }

    public function create()
    {
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $subklasifikasi = SubKlasifikasi::all();
        $surat = Surat::all();
        $skpd = Skpd::all();
        return view('admin.addsurat', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'skpd'));
    }

    public function store(Request $request)
    {
        $surat = new Surat;
        $surat->id_sub_klasifikasi = $request->id_sub_klasifikasi;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->id_skpd = $request->id_skpd;
        $surat->inisiator = $request->inisiator;
        $surat->status_surat = $request->status_surat;
        $surat->id = $request->id;
        $surat->tanggal_terima = $request->tanggal_terima;
        $surat->perihal = $request->perihal;

        if ($request->hasFile('filesurat')) {
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $surat->file_surat = $filename;
        } else {
            return $request;
            $surat->file_surat = '';
        }

        $surat->save();
        return redirect('/adminDasarsurat')->with('success', 'Data Surat Berhasil Ditambahkan!');
    }

    public function edit(Request $request, $id_surat)
    {
        $surat = Surat::find($id_surat);
        $user = NewUser::all();
        $klasifikasi = Klasifikasi::all();
        $skpd = Skpd::all();
        $subklasifikasi = SubKlasifikasi::all();
        return view('admin.editsurat', compact('surat', 'subklasifikasi', 'user', 'klasifikasi', 'skpd'));
    }

    public function update(Request $request, $id_surat)
    {
        $surat = Surat::find($id_surat);
        $surat->id_sub_klasifikasi = $request->id_sub_klasifikasi;
        $surat->nomor_surat = $request->nomor_surat;
        $surat->id_skpd = $request->id_skpd;
        $surat->inisiator = $request->inisiator;
        $surat->status_surat = $request->status_surat;
        $surat->id = $request->id;
        $surat->tanggal_terima = $request->tanggal_terima;
        $surat->perihal = $request->perihal;

        if ($request->hasFile('filesurat')) {
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $surat->file_surat = $filename;
        } else {
            return $request;
            $surat->file_surat = '';
        }

        $surat->save();
        return redirect('/adminDasarsurat')->with('success', 'Data Surat Berhasil Diubah!');
    }

    public function destroy($id_surat)
    {
        $surat = Surat::find($id_surat);
        $surat->delete();
        return redirect('/adminDasarsurat')->with('success', 'Data Surat Berhasil Dihapus!');
    }
}
