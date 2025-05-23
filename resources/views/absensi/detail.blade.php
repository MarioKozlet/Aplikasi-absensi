<!-- resources/views/absensi/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Input Absensi</h2>

        <!-- Tampilkan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="kelas_id" class="form-label">Kelas</label>
                <select class="form-select" id="kelas_id" name="kelas_id" required>
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="guru_id" class="form-label">Guru</label>
                <select class="form-select" id="guru_id" name="guru_id" required>
                    <option value="">-- Pilih Guru --</option>
                    @foreach ($guruList as $guru)
                        <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
            </div>

            <div class="mb-3">
                <label for="absen" class="form-label">Status Absen</label>
                <select class="form-select" id="absen" name="absen" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alfa">Alfa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Absensi</button>
        </form>
    </div>
@endsection
