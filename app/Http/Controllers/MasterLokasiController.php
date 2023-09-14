<?php

namespace App\Http\Controllers;

use App\Models\MasterLokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterLokasiController extends Controller
{
    public function create()
    {
        return view('masterdata.masterlokasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lokasi' => 'required',
        ]);

        MasterLokasi::create($data);

        return redirect()->route('masterlokasi.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index()
    {
        $data = DB::table('master_lokasi')
            ->paginate(10);
        return view('masterdata.masterlokasi.index', compact('data'));
    }

    public function show(MasterLokasi $masterlokasi)
    {
        return view('masterdata.masterlokasi.show', compact('masterlokasi'));
    }

    public function edit($id)
    {
        $masterlokasi = MasterLokasi::findOrFail($id);
        return view('masterdata.masterlokasi.edit', compact('masterlokasi'));
    }

    public function update(Request $request, MasterLokasi $masterlokasi)
    {
        $data = $request->validate([
            'lokasi' => 'required',
        ]);

        $masterlokasi->update($data);

        return redirect()->route('masterlokasi.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterLokasi $masterlokasi)
    {
        $masterlokasi->delete();
        return redirect()->route('masterlokasi.index')->with('success', 'Data berhasil dihapus.');
    }
}
