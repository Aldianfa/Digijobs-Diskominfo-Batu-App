<?php

namespace App\Http\Controllers;


use App\Models\LogKegiatan;
use App\Models\Surat;
use App\Models\Kegiatan;
use App\Models\Indikator;
use App\Models\Urusan;
use App\Models\Program;
use App\Models\SubProgram;
use App\Models\Bagian;
use App\Models\BidangKegiatan;
use App\Models\Jabatan;
use App\Models\NewUser;
use App\Models\Klasifikasi;
use App\Charts\KegiatanChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function track($id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $logkegiatan = LogKegiatan::where('id_kegiatan', $id_kegiatan)->get();

        // $allkegiatan = $kegiatan->merge($logkegiatan);
        //var where merge table kegiatan and log kegiatan where id_kegiatan = id_kegiatan to tracking
        // $allkegiatanmasuk = $kegiatan->merge($logkegiatan);
        // dd($logkegiatan);

        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('admin.track', compact('kegiatan', 'surat', 'user', 'indikator', 'bidangkegiatan', 'listuser', 'logkegiatan'));
    }
    public function coba()
    {
        $urusan = Urusan::all();
        $program = Program::all();
        $subprogram = Subprogram::all();

        return view('admin.coba', compact('urusan','program', 'subprogram'));
    }

    public function index(KegiatanChart $KegiatanChart)
    {
        $indikator = Indikator::all();
        $program = Program::all();
        $subprogram = SubProgram::all();
        $pengguna = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();
        $klasifikasi = Klasifikasi::all();
        $jabatan = Jabatan::all();

        $surat = Surat::all();
        $kegiatan = Kegiatan::all();
        $logkegiatan = LogKegiatan::all();
        $allkegiatan = $kegiatan->merge($logkegiatan);

        $kegiatanchart = $KegiatanChart->build();

        return view('admin.dashboard', compact('pengguna', 'bidangkegiatan', 'klasifikasi', 'jabatan', 'program', 'subprogram','indikator', 'surat', 'kegiatan', 'logkegiatan', 'allkegiatan', 'kegiatanchart'));
    }

    public function bagian()
    {
        $bagian = Bagian::all();
        return view('admin.bagian', compact('bagian'));
    }

    
    public function allkegiatan()
    {
        $surat = Surat::all();
        $kegiatan = Kegiatan::all();
        $logkegiatan = LogKegiatan::all();

        $jumkegiatan = Kegiatan::count();
        $jumlogkegiatan = LogKegiatan::count();
        $jumallkegiatan = $jumkegiatan + $jumlogkegiatan;
        
        return view('admin.setting', compact('kegiatan', 'surat', 'logkegiatan', 'jumallkegiatan'));
    }

    public function kegiatanshow($id_kegiatan){
        $kegiatan = Kegiatan::find($id_kegiatan);
        $surat = Surat::all();
        $indikator = Indikator::all();
        $logkegiatan = LogKegiatan::all();
        // $allkegiatan = $kegiatan->merge($logkegiatan);
        return view('adminkegiatan.show', compact('kegiatan', 'surat', 'logkegiatan'));
    }

    public function kegiatanedit(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $surat = Surat::all();
        $user  = NewUser::all();
        $indikator = Indikator::all();
        $bidangkegiatan = BidangKegiatan::all();

        $idjabatan = auth()->user()->id_jabatan;
        // $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->get()->value('id_jabatan');
        $listJabatan = Jabatan::where('id_sub_bagian', $idjabatan)->pluck('id_jabatan');
        $listuser = NewUser::whereIn('id_jabatan', $listJabatan)->get();

        return view('adminkegiatan.edit', compact('kegiatan', 'surat', 'user', 'indikator', 'bidangkegiatan', 'listuser'));
    }

    public function kegiatanupdate(Request $request, $id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->id_surat = $request->id_surat;
        $kegiatan->id_indikator = $request->id_indikator;
        $kegiatan->id = $request->id;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->inisiator = $request->inisiator;
        $kegiatan->bidang = $request->bidang;
        $kegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->narasi = $request->narasi;
        $kegiatan->keterangan = $request->keterangan;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $kegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $kegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $kegiatan->dokumentasi_2 = $filename;
        } else {
            return $request;
            $kegiatan->dokumentasi_2 = '';
        }

        $kegiatan->save();
        return redirect('/allkegiatan')->with('kegiatansuccess', 'Data Berhasil Diupdate');
    }

    public function kegiatandestroy($id_kegiatan)
    {
        $kegiatan = Kegiatan::find($id_kegiatan);
        $kegiatan->delete();
        return redirect('/allkegiatan')->with('kegiatansuccess', 'Data Berhasil Dihapus');
    }

    public function logshow($id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $surat = Surat::all();
        $indikator = Indikator::all();
        $user  = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();
        return view('adminlog.show', compact('logkegiatan', 'surat', 'indikator', 'user', 'bidangkegiatan'));
    }

    public function logedit(Request $request, $id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $surat = Surat::all();
        $jabatan = Jabatan::all();
        $indikator = Indikator::all();
        $user  = NewUser::all();
        $bidangkegiatan = BidangKegiatan::all();
        return view('adminlog.edit', compact('logkegiatan', 'surat', 'indikator', 'user', 'bidangkegiatan'));
    }

    public function logupdate(Request $request, $id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $logkegiatan->id_kegiatan = $request->id_kegiatan;
        $logkegiatan->id_surat = $request->id_surat;
        $logkegiatan->id = $request->id;
        $logkegiatan->inisiator = $request->inisiator;
        $logkegiatan->bidang = $request->bidang;
        $logkegiatan->tanggal_kegiatan = $request->tanggal_kegiatan;
        $logkegiatan->status = $request->status;
        $logkegiatan->keterangan = $request->keterangan;
        $logkegiatan->narasi = $request->narasi;
        $logkegiatan->id_indikator = $request->id_indikator;
        $logkegiatan->id_bidang_kegiatan = $request->id_bidang_kegiatan;
        
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/image/', $filename);
            $logkegiatan->dokumentasi_1 = $filename;
        } else {
            return $request;
            $logkegiatan->dokumentasi_1 = '';
        }

        if($request->hasFile('filesurat')){
            $file = $request->file('filesurat');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/surat/', $filename);
            $logkegiatan->dokumentasi_2 = $filename;
        } else {
            return $request;
            $logkegiatan->dokumentasi_2 = '';
        }

        $logkegiatan->save();
        return redirect('/allkegiatan')->with('success', 'Data Berhasil Diupdate');
    }

    public function logdestroy($id_log)
    {
        $logkegiatan = LogKegiatan::find($id_log);
        $logkegiatan->delete();
        return redirect('/allkegiatan')->with('success', 'Data Berhasil Dihapus');
    }
    
}
