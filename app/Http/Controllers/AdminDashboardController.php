<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function setting()
    {
        return view('admin.setting');
    }

    public function delete_data()
    {
        // Tabel yang ingin dikecualikan
        $excludedTables = ['users', 'qsikaps', 'qpengetahuans'];

        // Mendapatkan semua nama tabel di database
        $tables = DB::select('SHOW TABLES');

        foreach ($tables as $table) {
            $tableName = reset($table);

            // Periksa apakah nama tabel termasuk ke dalam tabel yang ingin dikecualikan
            if (!in_array($tableName, $excludedTables)) {
                // Menghapus semua data dari setiap tabel kecuali tabel yang dikecualikan
                DB::table($tableName)->delete();
            }
        }

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('status', 'Data pada semua field kecuali tabel users, qsikaps, dan qpengetahuans berhasil dihapus.');
    }
}