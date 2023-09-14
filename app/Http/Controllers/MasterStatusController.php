<?php

namespace App\Http\Controllers;

use App\Models\MasterStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterStatusController extends Controller
{
    public function create()
    {
        return view('masterdata.masterstatus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        MasterStatus::create($data);

        return redirect()->route('masterstatus.index')->with('success', 'Data berhasil disimpan.');
    }

    public function index()
    {
        $data = DB::table('master_status')
            ->paginate(10);
        return view('masterdata.masterstatus.index', compact('data'));
    }

    public function show(MasterStatus $masterstatus)
    {
        return view('masterdata.masterstatus.show', compact('masterstatus'));
    }

    public function edit($id)
    {
        $masterstatus = MasterStatus::findOrFail($id);
        return view('masterdata.masterstatus.edit', compact('masterstatus'));
    }

    public function update(Request $request, MasterStatus $masterstatus)
    {
        $data = $request->validate([
            'status' => 'required',
        ]);

        $masterstatus->update($data);

        return redirect()->route('masterstatus.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(MasterStatus $masterstatus)
    {
        $masterstatus->delete();
        return redirect()->route('masterstatus.index')->with('success', 'Data berhasil dihapus.');
    }
}
