<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiContoller extends Controller
{
    public function index()
    {
        $kelas = Kelas::query()
            ->get();
        return view('siswa-kelas.index', $kelas);
    }

    public function create(Request $request, Kelas $kelas)
    {
        $request->validate([
            'id_kelas' => 'required|string',
            'id_guru' => 'required|string',
            'id_siswa' => 'required|string',
        ]);

        KelasPeserta::updateOrCreate(
            [
                'id_kelas' => $request->id_kelas,
            ],
            [
                'id_guru' => $request->id_guru,
                'id_siswa' => $request->id_siswa,
            ]
        );

        return redirect()->route('absensi.index')->with('success', 'Peserta kelas berhasil ditambahkan atau diperbarui.');
    }

}
