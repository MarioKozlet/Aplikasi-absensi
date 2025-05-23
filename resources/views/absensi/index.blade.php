@extends('layouts.app')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-users icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Data Guru
                            <div class="page-title-subheading">
                                <?= date('l, d F Y') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Data Absen</h5>

                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="my-table">
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
                                                        <td>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('absensi.store', ['id' => $item->id]) }}">Detail</a>
                                                        </td>
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
@endsection
