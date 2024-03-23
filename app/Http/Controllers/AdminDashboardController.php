<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
        $excludedTables = ['users', 'qsikaps', 'jawaban_sikaps', 'qpengetahuans', 'qtindakans', 'jawaban_quiz_keterampilans', 'quiz_keterampilans'];

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

    public function downloadAllUsers()
    {
        $pdfExport = new UsersPdfExport();
        $pdfContent = $pdfExport->export();

        return Response::make($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="users.pdf"',
        ]);
    }

    public function informasi()
    {
        $informasi = Informasi::all();

        return view('admin.informasi', compact('informasi'));
    }

    public function create_informasi()
    {
        return view('admin.create_informasi');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string',
            'isi_informasi' => 'required|string',
            'gambar' => 'required|image', // Tentukan validasi untuk gambar
        ]);

        // Simpan gambar ke storage
        $gambar = $request->file('gambar')->store('img', 'public');

        // Buat informasi baru
        Informasi::create([
            'judul' => $request->judul,
            'isi_informasi' => $request->isi_informasi,
            'gambar' => $gambar,
        ]);

        return redirect()->route('admin.informasi')
        ->with('success', 'Informasi berhasil ditambahkan.');
    }

    public function edit_informasi(Informasi $informasi)
    {
        return view('admin.edit_informasi', compact('informasi'));
    }

    public function update_informasi(Request $request, Informasi $informasi)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string',
            'isi_informasi' => 'required|string',
            'gambar' => 'nullable|image', // Anda bisa mengubah gambar atau tidak
        ]);

        // Jika ada gambar baru, simpan gambar ke storage
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('img', 'public');
            $informasi->gambar = $gambar;
        }

        // Update informasi
        $informasi->judul = $request->judul;
        $informasi->isi_informasi = $request->isi_informasi;
        $informasi->save();

        return redirect()->route('admin.informasi')
        ->with('success', 'Informasi berhasil diperbarui.');
    }
}