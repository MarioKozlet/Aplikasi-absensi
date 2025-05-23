@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-6">Pilih Siswa untuk Ditambahkan ke Kelas {{ $kelas->nama_kelas }}</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

            <div class="overflow-x-auto mb-4">
                <table class="w-full table-auto border border-gray-200 rounded-md">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-2 text-left">Pilih</th>
                            <th class="p-2 text-left">NIS</th>
                            <th class="p-2 text-left">Nama</th>
                            <th class="p-2 text-left">Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siswas as $siswa)
                            <tr class="border-t border-gray-200">
                                <td class="p-2">
                                    <input type="radio" name="siswa_id" value="{{ $siswa->id }}" required>
                                </td>
                                <td class="p-2">{{ $siswa->nis }}</td>
                                <td class="p-2">{{ $siswa->nama_siswa }}</td>
                                <td class="p-2">{{ $siswa->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-gray-500 p-4">Tidak ada siswa yang tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Tambah ke
                    Kelas</button>
            </div>
        </form>
    </div>
@endsection
