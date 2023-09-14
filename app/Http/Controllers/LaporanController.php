<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berwujud;
use App\Models\TBerwujud;
use App\Models\MasterJenis;
use App\Models\MasterStatus;
use App\Models\MasterKeadaan;
use App\Models\MasterLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class LaporanController extends Controller
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

        $combinedData = $dataBerwujud->unionAll($dataTBerwujud)->paginate(20);

        return view('laporan.index', compact('combinedData'));
    }

    public function downloadPDF()
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

        $combinedData = $dataBerwujud->unionAll($dataTBerwujud)->paginate(20);

        $pdf = PDF::loadview('pdf.laporan', ['combinedData' => $combinedData]);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('laporan_data_asset.pdf');
    }
}
