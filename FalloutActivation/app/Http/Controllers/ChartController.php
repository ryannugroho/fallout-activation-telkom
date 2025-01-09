<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Laporan;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;

class ChartController extends Controller
{
    public function index(Request $request)
    {
        
        // Mendapatkan tanggal awal dan akhir bulan ini
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Mendapatkan bulan yang dipilih dari request
        $bulan = $request->input('bulan');

        // Jika bulan dipilih, ubah tanggal awal dan akhir berdasarkan bulan yang dipilih
        if ($bulan) {
            $startDate = Carbon::parse($bulan)->startOfMonth();
            $endDate = Carbon::parse($bulan)->endOfMonth();
        }

        // Mengambil data untuk bulan ini atau bulan yang dipilih
        $helpdeskData = DB::table('laporan')
            ->join('users', 'laporan.id_helpdesk', '=', 'users.id')
            ->select('users.name', DB::raw('COUNT(laporan.status) as closed_count'))
            ->where('users.role', 'helpdesk')
            ->where('laporan.status', 'closed')
            ->whereBetween('laporan.updated_at', [$startDate, $endDate])
            ->groupBy('users.name')
            ->orderByDesc('closed_count')
            ->limit(5)
            ->get();

        // Mengambil data jumlah status tertutup untuk permintaan tertentu dalam bulan ini atau bulan yang dipilih
        $statusCounts = DB::table('laporan')
            ->select(
                DB::raw('COUNT(CASE WHEN permint = "config" THEN 1 END) AS config'),
                DB::raw('COUNT(CASE WHEN permint = "fallout" THEN 1 END) AS fallout'),
                DB::raw('COUNT(CASE WHEN permint = "hapus_onu" THEN 1 END) AS hapus_onu'),
                DB::raw('COUNT(CASE WHEN permint = "cek_datek" THEN 1 END) AS cek_datek'),
                DB::raw('COUNT(CASE WHEN permint = "datek_onu" THEN 1 END) AS datek_onu')
            )
            ->whereBetween('created_at', [$startDate, $endDate])
            ->first();

        $averageHD = DB::table('laporan')
            ->select(
                'oleh',
                DB::raw('ROUND(AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) / 3600, 2) AS average')
            )
            ->where('status', 'closed')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->groupBy('oleh')
            ->orderByDesc('average')
            ->limit(10)
            ->get();

        $averagePermint = DB::table('laporan')
            ->select(
                'permint',
                DB::raw('ROUND(AVG(TIMESTAMPDIFF(SECOND, created_at, updated_at)) / 3600, 2) AS average')
            )
            ->where('status', 'closed')
            ->whereBetween('updated_at', [$startDate, $endDate])
            ->groupBy('permint')
            ->orderByDesc('average')
            ->get();

        return view('statistik', compact('helpdeskData', 'statusCounts', 'averageHD', 'averagePermint'));
    }

}
