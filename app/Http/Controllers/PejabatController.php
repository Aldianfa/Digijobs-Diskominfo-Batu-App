<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\NewUser;
use App\Charts\KegiatanChart;
use App\Charts\KegiatanStaffChart;
use App\Models\BidangKegiatan;
use App\Models\LogKegiatan;
use App\Models\Surat;
use App\Models\Kegiatan;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PejabatController extends Controller
{
    public function index(KegiatanChart $kegiatanChart)
    {
        //menampilkan kegiatan dengan id yang ada pada tabel bidangkegiatan sama dengan id yang sedang login
        $user = Auth::user(); // Mendapatkan user yang sedang login
        $kegiatan = Kegiatan::whereHas('bidangkegiatans', function ($query) use ($user) {
        $query->where('id', $user->id);
        })->get();

        $logkegiatan = LogKegiatan::whereHas('bidangkegiatans', function ($query) use ($user) {
            $query->where('id', $user->id);
            })->get();

        $kegiatanchart = $kegiatanChart->build();

        return view('penilaian.penilaian', compact('kegiatan', 'logkegiatan', 'kegiatanchart'));
    }

    public function penilaianstaff(KegiatanStaffChart $kegiatanStaffChart)
    {
        $idjabatan = auth()->user()->id_jabatan;
        // $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->value('id_jabatan');
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        //var namastaff is nama berdasarkan $listuser
        $namastaff = NewUser::whereIn('id_jabatan', $listJabatan)->pluck('nama');

        //menampilkan kegiatan dengan inisiator sama dengan $namastaff
        $kegiatan = Kegiatan::whereIn('inisiator', $namastaff)->get();
        $logkegiatan = LogKegiatan::whereIn('inisiator', $namastaff)->get();

        // dd($kegiatan);

        $kegiatanstaffchart = $kegiatanStaffChart->build();

        return view('penilaian.penilaianstaff', compact('kegiatan', 'listuser', 'logkegiatan', 'kegiatanstaffchart'));

    }

    public function penilaiankegiatan(Request $request, $id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->nilai = $request->nilai;
        $kegiatan->catatan_nilai = $request->catatan_nilai;

        $kegiatan->save();
        return redirect('/penilaian')->with(['kegiatansuccess' => 'Penilaian Berhasil!'
        ]);
    }

    public function penilaianlog(Request $request, $id_log){
        $logkegiatan = LogKegiatan::find($id_log);
        $logkegiatan->nilai = $request->nilai;
        $logkegiatan->catatan_nilai = $request->catatan_nilai;

        $logkegiatan->save();
        return redirect('/penilaian')->with(['success' => 'Penilaian Berhasil!'
        ]);
    }
}
