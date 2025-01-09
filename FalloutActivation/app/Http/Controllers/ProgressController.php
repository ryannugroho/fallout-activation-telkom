<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Progress;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    public function show($id)
    {
        $laporan = Laporan::findOrFail($id);
        $progress = Progress::all();

        return view('dashboard', compact('laporan', 'progress'));
    }

    public function index()
    {
        $progress = Progress::all();

        return view('dashboard', compact('progress'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pesan' => 'required',
        ]);

        // Simpan progress baru
        $progress = new Progress();
        $progress->id_laporan = $id; // Asumsi laporan_id merupakan kunci asing ke tabel laporan
        $progress->pesan = $request->pesan;
        $progress->save();

        // Ambil laporan yang sesuai
        $laporan = Laporan::findOrFail($id);
    
        // Periksa tombol mana yang diklik
        $action = $request->input('action');
        if ($action === 'resolved') {
            $laporan->status = 'closed';
        } elseif ($action === 'not_resolved') {
            $laporan->status = 'on going progress';
        }

        $laporan->save();

        return redirect()->back()->with('success', 'Progress berhasil diperbarui.');
    }
}
