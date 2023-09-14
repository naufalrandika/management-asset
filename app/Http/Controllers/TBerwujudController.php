<?php

namespace App\Http\Controllers;

use App\Models\TBerwujud;
use App\Models\MasterJenis;
use App\Models\MasterStatus;
use App\Models\MasterKeadaan;
use App\Models\MasterLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;


class TBerwujudController extends Controller
{
    public function create()
    {
        // Ambil data jenis dari tabel master_jenis
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $statusOptions = MasterStatus::pluck('status', 'id');
        $keadaanOptions = MasterKeadaan::pluck('keadaan', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi','id');

        return view('pages.tberwujud.create', compact('jenisOptions', 'statusOptions', 'keadaanOptions', 'lokasiOptions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis' => 'required',
            'lokasi' => 'nullable',
            'keadaan' => 'required',
            'masa_pemakaian' => 'nullable',
            'tanggal_terima' => 'nullable|date',
            'Nilai' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        TBerwujud::create($data);

        return redirect()->route('tberwujud.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi','id');

        $query = TBerwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'tberwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'tberwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'tberwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'tberwujud.lokasi')
            ->select('tberwujud.*', 'master_jenis.jenis as jenis', 'master_status.status as status', 'master_keadaan.keadaan as keadaan', 'master_lokasi.lokasi as lokasi');

        if ($request->has('jenis')) {
            $jenisId = $request->input('jenis');
            if ($jenisId != '') {
                $query->where('tberwujud.jenis', $jenisId);
            }
        }
        if ($request->has('lokasi')) {
            $lokasiId = $request->input('lokasi');
            if ($lokasiId != '') {
                $query->where('tberwujud.lokasi', $lokasiId);
            }
        }

        $data = $query->paginate(20);

        return view('pages.tberwujud.index', compact('data', 'jenisOptions', 'lokasiOptions'));
    }

    public function show(TBerwujud $tberwujud)
    {
        return view('pages.tberwujud.show', compact('tberwujud'));
    }

    public function edit($id)
    {
        $tberwujud = TBerwujud::findOrFail($id);
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $statusOptions = MasterStatus::pluck('status', 'id');
        $keadaanOptions = MasterKeadaan::pluck('keadaan', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi', 'id');
        return view('pages.tberwujud.edit', compact('tberwujud', 'jenisOptions', 'statusOptions', 'keadaanOptions', 'lokasiOptions'));
    }

    public function update(Request $request, TBerwujud $tberwujud)
    {
        $data = $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'jenis' => 'required|exists:master_jenis,id',
            'lokasi' => 'nullable',
            'keadaan' => 'required',
            'masa_pemakaian' => 'nullable',
            'tanggal_terima' => 'nullable|date',
            'Nilai' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $tberwujud->update($data);

        return redirect()->route('tberwujud.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(TBerwujud $tberwujud)
    {
        $tberwujud->delete();
        return redirect()->route('tberwujud.index')->with('success', 'Data berhasil dihapus.');
    }

    public function downloadPDF()
    {
        $data = TBerwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'tberwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'tberwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'tberwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'tberwujud.lokasi')
            ->select('tberwujud.*', 'master_jenis.jenis as jenis', 'master_status.status as status', 'master_keadaan.keadaan as keadaan', 'master_lokasi.lokasi as lokasi')
            ->paginate(10);
        $pdf = PDF::loadview('pdf.tberwujud', ['data' => $data]);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('tidakberwujud_data.pdf');
    }
}
