<?php

namespace App\Http\Controllers;

use App\Models\MasterKeadaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterKeadaanController extends Controller
{
    public function create()
    {
        return view('masterdata.masterkeadaan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keadaan' => 'required',
        ]);

        MasterKeadaan::create($data);

        return redirect()->route('masterkeadaan.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index()
    {
        $data = DB::table('master_keadaan')
            ->paginate(10);
        return view('masterdata.masterkeadaan.index', compact('data'));
    }

    public function show(MasterKeadaan $masterkeadaan)
    {
        return view('masterdata.masterkeadaan.show', compact('masterkeadaan'));
    }

    public function edit($id)
    {
        $masterkeadaan = MasterKeadaan::findOrFail($id);
        return view('masterdata.masterkeadaan.edit', compact('masterkeadaan'));
    }

    public function update(Request $request, MasterKeadaan $masterkeadaan)
    {
        $data = $request->validate([
            'keadaan' => 'required',
        ]);

        $masterkeadaan->update($data);

        return redirect()->route('masterkeadaan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterKeadaan $masterkeadaan)
    {
        $masterkeadaan->delete();
        return redirect()->route('masterkeadaan.index')->with('success', 'Data berhasil dihapus.');
    }
}
