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
        if ($siswa && $ortu && $ortu->nomor_ortu) {
            // Format nomor WA
            $nomor = preg_replace('/[^0-9]/', '', $ortu->nomor_ortu); // hilangkan karakter non-digit
    
            if (str_starts_with($nomor, '08')) {
                $nomor = '62' . substr($nomor, 1);
            }
    
            $pesan = "Halo Ibu dari {$siswa->nama},\nHari ini ({$validated['tanggal']}), siswa dinyatakan: {$value['status']}.";
    
            try {
                Http::post('http://localhost:3000/send-message', [
                    'phone' => $nomor, 
                    'message' => $pesan,
                ]);
            } catch (\Exception $e) {
                \Log::error('Gagal kirim pesan WA: ' . $e->getMessage());
            }
        }

        return redirect()->route('absensi')->with('success', 'Absensi created and message sent.');
    }
}
