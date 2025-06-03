@extends('layouts.app')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="row">
                <div class="col-md-10 offset-md-1">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Input Absensi</h5>

                            {{-- Tampilkan error jika ada --}}
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('absensi.store', ['id' => $kelas->id]) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="hidden" class="form-control" id="tanggal" name="kelas_id"
                                        value="{{ $kelas->id }}" required>
                                    <input type="hidden" class="form-control" id="tanggal" name="guru_id"
                                        value="{{ auth()->user()->guru->id }}" required>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                </div>

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Siswa</th>
                                            <th>Status Absen</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($siswa as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->nama_siswa }}
                                                    <input type="hidden" name="absen[{{ $loop->index }}][siswa_id]"
                                                        value="{{ $item->id }}">
                                                </td>
                                                <td>
                                                    <select name="absen[{{ $loop->index }}][status]"
                                                        class="form-select form-control" required>
                                                        <option value="">-- Pilih Status --</option>
                                                        <option value="Hadir">Hadir</option>
                                                        <option value="Izin">Izin</option>
                                                        <option value="Sakit">Sakit</option>
                                                        <option value="Alfa">Alfa</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <button type="submit" class="btn btn-primary">Simpan Absensi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
