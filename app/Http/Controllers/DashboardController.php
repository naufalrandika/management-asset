<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berwujud;
use App\Models\MasterJenis;
use App\Models\TBerwujud;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $dataBerwujud = Berwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'berwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'berwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'berwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'berwujud.lokasi')
            ->select(
                'berwujud.id as id',
                'berwujud.kode as kode',
                'berwujud.nama as nama',
                'master_jenis.jenis as jenis',
                'master_status.status as status',
                'master_keadaan.keadaan as keadaan',
                'master_lokasi.lokasi as lokasi',
                'berwujud.masa_pemakaian as masa_pemakaian',
                'berwujud.tanggal_terima as tanggal_terima',
                'berwujud.Nilai as Nilai',
                'berwujud.keterangan as keterangan'
            );

        $dataTBerwujud = TBerwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'tberwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'tberwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'tberwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'tberwujud.lokasi')
            ->select(
                'tberwujud.id as id',
                'tberwujud.kode as kode',
                'tberwujud.nama as nama',
                'master_jenis.jenis as jenis',
                'master_status.status as status',
                'master_keadaan.keadaan as keadaan',
                'master_lokasi.lokasi as lokasi',
                'tberwujud.masa_pemakaian as masa_pemakaian',
                'tberwujud.tanggal_terima as tanggal_terima',
                'tberwujud.Nilai as Nilai',
                'tberwujud.keterangan as keterangan'
            );

        $dataJenis = MasterJenis::pluck('jenis')->toArray();

        $combinedData = $dataBerwujud->unionAll($dataTBerwujud)->paginate(20);
        // Menghitung total berwujud
        $totalBerwujud = Berwujud::count();

        // Menghitung total tidak berwujud
        $totalTidakBerwujud = TBerwujud::count();

        // Menghitung total keseluruhan (berwujud + tidak berwujud)
        $totalSemua = $totalBerwujud + $totalTidakBerwujud;

        $totalNilaiBerwujud = Berwujud::sum('Nilai');

        // Menghitung total nilai tidak berwujud
        $totalNilaiTidakBerwujud = TBerwujud::sum('Nilai');

        // Menghitung total nilai keseluruhan (berwujud + tidak berwujud)
        $totalNilaiSemua = $totalNilaiBerwujud + $totalNilaiTidakBerwujud;

        return view('dashboard.index', compact('totalBerwujud', 'totalTidakBerwujud', 'totalSemua', 'totalNilaiBerwujud', 'totalNilaiTidakBerwujud', 'totalNilaiSemua', 'combinedData', 'dataJenis'));
    }
}
