<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Progress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

class LaporanController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        if ($userRole === 'helpdesk') {
            $laporanQuery = Laporan::whereNotIn('status', ['ON GOING PROGRESS', 'CLOSED'])
                ->orWhere(function ($query) use ($userId) {
                    $query->whereIn('status', ['ON GOING PROGRESS', 'CLOSED'])
                        ->where('id_helpdesk', $userId);
                });
        } else {
            $laporanQuery = Laporan::query();
        }

        $laporan = $laporanQuery->get();

        $progressCollection = [];

        foreach ($laporan as $laporanItem) {
            $progress = Progress::where('id_laporan', $laporanItem->id)->get();
            $progressCollection[$laporanItem->id] = $progress;
        }

        $openRequestsCountA = Laporan::where('status', 'REQUEST OPEN')
            ->where('layanan', 'INDIHOME')
            ->count();

        $openRequestsCountB = Laporan::where('status', 'REQUEST OPEN')
            ->where('layanan', 'INDIBIZ')
            ->count();

        if ($userRole === 'helpdesk') {
            $onGoingProgressCountA = Laporan::where('status', 'ON GOING PROGRESS')
                ->where('layanan', 'INDIHOME')
                ->where('id_helpdesk', $userId)
                ->count();

            $closedCountA = Laporan::where('status', 'CLOSED')
                ->where('layanan', 'INDIHOME')
                ->where('id_helpdesk', $userId)
                ->count();
            $onGoingProgressCountB = Laporan::where('status', 'ON GOING PROGRESS')
                ->where('layanan', 'INDIBIZ')
                ->where('id_helpdesk', $userId)
                ->count();

            $closedCountB = Laporan::where('status', 'CLOSED')
                ->where('layanan', 'INDIBIZ')
                ->where('id_helpdesk', $userId)
                ->count();
        } else {
            $onGoingProgressCountA = Laporan::where('status', 'ON GOING PROGRESS')
                ->where('layanan', 'INDIHOME')
                ->count();

            $closedCountA = Laporan::where('status', 'CLOSED')
                ->where('layanan', 'INDIHOME')
                ->count();

            $onGoingProgressCountB = Laporan::where('status', 'ON GOING PROGRESS')
                ->where('layanan', 'INDIBIZ')
                ->count();

            $closedCountB = Laporan::where('status', 'CLOSED')
                ->where('layanan', 'INDIBIZ')
                ->count();
        }

        return view(
            'dashboard',
            compact(
                'laporan',
                'progressCollection',
                'openRequestsCountA',
                'onGoingProgressCountA',
                'closedCountA',
                'openRequestsCountB',
                'onGoingProgressCountB',
                'closedCountB'
            )
        );
    }

    public function filterByStatus(Request $request)
    {
        $status = $request->input('status');
        $layanan = $request->input('layanan');
        $userId = Auth::user()->id;
        $userRole = Auth::user()->role;

        $laporanQuery = Laporan::where('status', $status)
            ->where('layanan', $layanan);

        // Jika peran pengguna adalah 'helpdesk' dan status adalah 'ON GOING PROGRESS' atau 'CLOSED'
        if ($userRole === 'helpdesk' && in_array($status, ['ON GOING PROGRESS', 'CLOSED'])) {
            $laporanQuery->where('id_helpdesk', $userId);
        } else {
            $laporanQuery = Laporan::where('status', $status)
                ->where('layanan', $layanan);
        }

        $laporan = $laporanQuery->get();
        $progressCollection = [];

        foreach ($laporan as $laporanItem) {
            $progress = Progress::where('id_laporan', $laporanItem->id)->get();
            $progressCollection[$laporanItem->id] = $progress;
        }


        return view(
            'dashboard',
            compact(
                'laporan',
                'progressCollection'
            )
        );
    }

    public function changeStatus(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);


        try {
            DB::transaction(function () use ($id) {
                // Mengunci baris laporan untuk diupdate
                $laporan = Laporan::where('id', $id)->lockForUpdate()->firstOrFail();

                // Periksa apakah status sudah diubah oleh orang lain
                if ($laporan->status !== 'ON GOING PROGRESS') {
                    $laporan->status = 'ON GOING PROGRESS';
                    $laporan->id_helpdesk = Auth::user()->id;
                    $laporan->oleh = Auth::user()->name;
                    $laporan->save();

                    $progress = new Progress();
                    $progress->id_laporan = $id;
                    $progress->pesan = 'Laporan diterima oleh Helpdesk ' . $laporan->oleh;
                    $progress->save();
                } else {
                    throw new \Exception('Laporan sudah dalam status ON GOING PROGRESS');
                }
            });

            return redirect()->route('dashboard')->with('successTerima', 'Status laporan berhasil diubah menjadi ON GOING PROGRESS');
        } catch (QueryException $e) {
            // Menangkap error yang dihasilkan oleh trigger
            if ($e->getCode() == '45000') {
                return redirect()->route('dashboard')->with('errorTerima', 'Status laporan sudah diterima oleh ' . $laporan->oleh);
            } else {
                return redirect()->route('dashboard')->with('errorTerima', 'Gagal mengubah status laporan, silakan coba lagi.');
            }
        } catch (\Exception $e) {
            return redirect()->route('dashboard')->with('errorTerima', 'Gagal mengubah status laporan, silakan coba lagi.');
        }
    }

    public function edit(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'status' => 'required',
        ]);

        // Mengambil pengguna berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        // Mengupdate data pengguna
        $laporan->status = $request->status;
        if ($laporan->status == 'request open') {
            $laporan->id_helpdesk = null;
            $laporan->oleh = null;
        }
        $progress = new Progress();
        $progress->id_laporan = $id;
        $progress->pesan = 'Status laporan diubah menjadi ' . $laporan->status . ' oleh Admin';
        $progress->save();
        $laporan->save();

        return redirect()->back()->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function hapus($id)
    {
        // Menghapus pengguna berdasarkan ID
        $laporan = Laporan::findOrFail($id);

        $progressCollection = Progress::where('id_laporan', $laporan->id)->get();

        // Menghapus semua progress terkait
        foreach ($progressCollection as $progress) {
            $progress->delete();
        }

        $laporan->delete();

        return redirect()->back()->with('success', 'Data pengguna berhasil dihapus.');
    }
}