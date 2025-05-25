@extends('layouts.app')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-id icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Data Kelas Peserta
                            <div class="page-title-subheading">
                                <?= date('l, d F Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="alert alert-info">
                        <b>Info!</b> Halaman data kelas adalah halaman yang menampilkan kelas yang terdaftar pada sistem.
                        <br>
                        Anda dapat menambahkan, mengubah (edit), atau menghapus kelas yang ada. <br>
                        Data yang terdaftar pada sistem akan terhubung dengan data yang lain.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-xl-12">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Total Kelas</div>
                                <div class="widget-subheading">Kelas yang terdaftar</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>{{ count($kelas) }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Data Kelas</h5>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="kelas-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Kelas</th>
                                                    <th>Nama Kelas</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <tr>
                                                    @foreach ($kelas as $item)
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->kode_kelas }}</td>
                                                        <td>{{ $item->nama_kelas }}</td>
                                                        <td><a href="{{ route('kelas-peserta.create', ['id' => $item->id]) }}"
                                                                class="btn btn-primary">Detail</a></td>
                                                    @endforeach
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection
