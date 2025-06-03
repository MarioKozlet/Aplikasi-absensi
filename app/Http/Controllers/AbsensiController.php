<?php

namespace App\Http\Controllers;
use App\Ortu;
use App\Kelas;
use App\Siswa;
use App\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
        public function index()
    {
        $kelas = Kelas::query()
            ->get();
        return view('absensi.index', ['kelas' => $kelas]);
    }

    public function create(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $siswa = Siswa::all();

        return view('absensi.detail', [
            'kelas' => $kelas,
            'siswa' => $siswa, // Ambil siswa berdasarkan kelas
        ]);
    }

    public function store(Request $request, Kelas $kelas)
    {
        $validated = $request->validate([
            'kelas_id' => 'required|string',
            'guru_id' => 'required|string',
            'tanggal' => 'required|date',
            'absen' => 'required',
        ]);
        
        // Simpan absensi
        // $absensi = Absensi::create($validated);
        
        // dd($request->input('absen'));
        foreach ($request->input('absen') as $key => $value) {
            // Ambil siswa berdasarkan kelas_id (asumsi satu siswa per absensi, bisa disesuaikan)
            $siswa = Siswa::where('id', $value['siswa_id'])->first(); // sesuaikan logika jika lebih dari 1 siswa
            $ortu = Ortu::where('siswa_nis', $siswa->nis_siswa)->first(); // ambil data ortu berdasarkan siswa
            if ($siswa && $ortu->nomor_ortu) {
                $pesan = "Halo Ibu dari {$siswa->nama},\nHari ini ({$validated['tanggal']}), siswa dinyatakan: {$validated['absen']}.";
                try {
                    Http::post('http://localhost:3000/send-message', [
                        'phone' => $siswa->nomor_ortu, // format: 628xxxxxxxxxx
                        'message' => $pesan,
                    ]);
                } catch (\Exception $e) {
                    // Log jika ada error
                    \Log::error('Gagal kirim pesan WA: ' . $e->getMessage());
                }
            }
        }

        return redirect()->route('absensi')->with('success', 'Absensi created and message sent.');
    }
}
