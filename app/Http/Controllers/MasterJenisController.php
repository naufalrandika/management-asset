<?php

namespace App\Http\Controllers;

use App\Models\MasterJenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterJenisController extends Controller
{
    public function create()
    {
        return view('masterdata.masterjenis.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jenis' => 'required',
        ]);

        MasterJenis::create($data);

        return redirect()->route('masterjenis.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index()
    {
        $data = DB::table('master_jenis')
            ->paginate(10);
        return view('masterdata.masterjenis.index', compact('data'));
    }

    public function show(MasterJenis $masterjenis)
    {
        return view('masterdata.masterjenis.show', compact('masterjenis'));
    }

    public function edit($id)
    {
        $masterjenis = MasterJenis::findOrFail($id);
        return view('masterdata.masterjenis.edit', compact('masterjenis'));
    }

    public function update(Request $request, MasterJenis $masterjenis)
    {
        $data = $request->validate([
            'jenis' => 'required',
        ]);

        $masterjenis->update($data);

        return redirect()->route('masterjenis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterJenis $masterjenis)
    {
        $masterjenis->delete();
        return redirect()->route('masterjenis.index')->with('success', 'Data berhasil dihapus.');
    }
}
