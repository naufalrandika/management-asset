<?php

namespace App\Http\Controllers;

use App\Models\Berwujud;
use App\Models\MasterJenis;
use App\Models\MasterStatus;
use App\Models\MasterKeadaan;
use App\Models\MasterLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;


class BerwujudController extends Controller
{
    public function create()
    {
        // Ambil data jenis dari tabel master_jenis
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $statusOptions = MasterStatus::pluck('status', 'id');
        $keadaanOptions = MasterKeadaan::pluck('keadaan', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi', 'id');

        return view('pages.berwujud.create', compact('jenisOptions', 'statusOptions', 'keadaanOptions', 'lokasiOptions'));
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

        Berwujud::create($data);

        return redirect()->route('berwujud.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index(Request $request)
    {
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi', 'id');

        $query = Berwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'berwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'berwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'berwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'berwujud.lokasi')
            ->select('berwujud.*', 'master_jenis.jenis as jenis', 'master_status.status as status', 'master_keadaan.keadaan as keadaan', 'master_lokasi.lokasi as lokasi');

        if ($request->has('jenis')) {
            $jenisId = $request->input('jenis');
            if ($jenisId != '') {
                $query->where('berwujud.jenis', $jenisId);
            }
        }
        if ($request->has('lokasi')) {
            $lokasiId = $request->input('lokasi');
            if ($lokasiId != '') {
                $query->where('berwujud.lokasi', $lokasiId);
            }
        }

        $data = $query->paginate(20);

        return view('pages.berwujud.index', compact('data', 'jenisOptions', 'lokasiOptions'));
    }


    public function show(Berwujud $berwujud)
    {
        return view('pages.berwujud.show', compact('berwujud'));
    }

    public function edit($id)
    {
        $berwujud = Berwujud::findOrFail($id);
        $jenisOptions = MasterJenis::pluck('jenis', 'id');
        $statusOptions = MasterStatus::pluck('status', 'id');
        $keadaanOptions = MasterKeadaan::pluck('keadaan', 'id');
        $lokasiOptions = MasterLokasi::pluck('lokasi', 'id');
        return view('pages.berwujud.edit', compact('berwujud', 'jenisOptions', 'statusOptions', 'keadaanOptions', 'lokasiOptions'));
    }

    public function update(Request $request, Berwujud $berwujud)
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

        $berwujud->update($data);

        return redirect()->route('berwujud.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Berwujud $berwujud)
    {
        $berwujud->delete();
        return redirect()->route('berwujud.index')->with('success', 'Data berhasil dihapus.');
    }

    public function downloadPDF()
    {
        $data = Berwujud::leftJoin('master_jenis', 'master_jenis.id', '=', 'berwujud.jenis')
            ->leftJoin('master_status', 'master_status.id', '=', 'berwujud.status')
            ->leftJoin('master_keadaan', 'master_keadaan.id', '=', 'berwujud.keadaan')
            ->leftJoin('master_lokasi', 'master_lokasi.id', '=', 'berwujud.lokasi')
            ->select('berwujud.*', 'master_jenis.jenis as jenis', 'master_status.status as status', 'master_keadaan.keadaan as keadaan', 'master_lokasi.lokasi as lokasi')
            ->paginate(10);
        $pdf = PDF::loadview('pdf.template', ['data' => $data]);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('berwujud_data.pdf');
    }
}
