<?php

namespace App\Http\Controllers;

use App\Models\BidangKegiatan;
use App\Models\Jabatan;
use App\Models\Kegiatan;
use App\Models\Klasifikasi;
use App\Models\NewUser;
use App\Models\Skpd;
use App\Models\SubKlasifikasi;
use App\Models\Surat;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function modalpenyelesaian (){
        $user  = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('modal.modalpenyelesaian', compact('user', 'bidangkegiatan', 'listuser'));
    }

    public function modaldispo (){
        $user  = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('modal.modaldsipo', compact('user', 'bidangkegiatan', 'listuser'));
    }


}
