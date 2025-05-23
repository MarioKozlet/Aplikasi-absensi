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
        $absensi = new Absensi();
        $absensi->fill($request->all());
        $absensi->save();

        return redirect()->route('absensi.index')->with('success', 'Absensi created successfully.');
    }

}
