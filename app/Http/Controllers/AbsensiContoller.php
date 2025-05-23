<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiContoller extends Controller
{
    public function index()
    {
        $kelas = Kelas::query()
            ->get();
        return view('absensi.index', $kelas);
    }

    public function create(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|string|exists:kelas,id',
            'guru_id' => 'required|string|exists:guru,id',
            'tanggal' => 'required|date',
            'absen' => 'required|in:Hadir,Izin,Sakit,Alfa',
        ]);

        // Simpan absensi
        $absensi = Absensi::create($validated);

        // Ambil siswa berdasarkan kelas_id (asumsi satu siswa per absensi, bisa disesuaikan)
        $siswa = Siswa::where('kelas_id', $validated['kelas_id'])->first(); // sesuaikan logika jika lebih dari 1 siswa
        ortu = Ortu::where('siswa_nis', $siswa->nis_siswa)->first(); // ambil data ortu berdasarkan siswa
        if ($siswa && $siswa->nomor_ibu) {
            $pesan = "Halo Ibu dari {$siswa->nama},\nHari ini ({$validated['tanggal']}), siswa dinyatakan: {$validated['absen']}.";
            try {
                Http::post('http://localhost:3000/send-message', [
                    'phone' => $siswa->nomor_ibu, // format: 628xxxxxxxxxx
                    'message' => $pesan,
                ]);
            } catch (\Exception $e) {
                // Log jika ada error
                \Log::error('Gagal kirim pesan WA: ' . $e->getMessage());
            }
        }

        return redirect()->route('absensi.index')->with('success', 'Absensi created and message sent.');
    }


}
