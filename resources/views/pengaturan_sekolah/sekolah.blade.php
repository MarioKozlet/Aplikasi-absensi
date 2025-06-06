@extends('layouts.app')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-settings icon-gradient bg-mean-fruit">
                            </i>
                        </div>
                        <div>Pengaturan Sekolah
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
                        <b>Info!</b> Halaman pengaturan sekolah adalah halaman yang mengatur informasi dasar tentang
                        sekolah. <br>
                        Anda dapat mengubah beberapa informasi dasar tentang sekolah anda.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-lg-8 col-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Informasi Sekolah</h5>

                            <form id="form-1" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" id="id"
                                    value="{{ $data['sekolah']->id ?? null }}">
                                <div class="row">
                                    <div class="col-md-12 mt-3">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="nama_sekolah" class="">Nama Sekolah</label> <span
                                                        class="text-danger">*</span>
                                                    <input name="nama_sekolah" id="nama_sekolah"
                                                        placeholder="Masukkan nama sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->nama_sekolah ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="npsn_sekolah" class="">NPSN Sekolah</label> <span
                                                        class="text-danger">*</span>
                                                    <input name="npsn_sekolah" id="npsn_sekolah"
                                                        placeholder="Masukkan nomor NPSN sekolah" type="text"
                                                        class="form-control" value="{{ $data['sekolah'] ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="jenjang_sekolah" class="">Jenjang Sekolah</label>
                                                    <span class="text-danger">*</span>
                                                    <select name="jenjang_sekolah" id="jenjang_sekolah"
                                                        class="form-control">
                                                        <option value="SD"
                                                            @if (isset($data['sekolah']) && $data['sekolah']->jenjang_sekolah === 'SD') selected @endif>SD/MI</option>
                                                        <option value="SMP"
                                                            @if (isset($data['sekolah']) && $data['sekolah']->jenjang_sekolah === 'SMP') selected @endif>SMP/MTs
                                                        </option>
                                                        <option value="SMA"
                                                            @if (isset($data['sekolah']) && $data['sekolah']->jenjang_sekolah === 'SMA') selected @endif>SMA/SMK
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="tipe_sekolah" class="">Tipe Sekolah</label> <span
                                                        class="text-danger">*</span>
                                                    <select name="tipe_sekolah" id="tipe_sekolah" class="form-control">
                                                        <option value="NEGERI"
                                                            @if (isset($data['sekolah']) && $data['sekolah']->tipe_sekolah == 'NEGERI') selected @endif>NEGERI
                                                        </option>
                                                        <option value="SWASTA"
                                                            @if (isset($data['sekolah']) && $data['sekolah']->tipe_sekolah == 'SWASTA') selected @endif>SWASTA
                                                        </option>
                                                    </select>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="telepon_sekolah" class="">Nomor Telepon
                                                        Sekolah</label> <span class="text-danger">*</span>
                                                    <input name="telepon_sekolah" id="telepon_sekolah"
                                                        placeholder="Masukkan nomor telepon sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->telepon_sekolah ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="email_sekolah" class="">E-mail Sekolah</label> <span
                                                        class="text-danger">*</span>
                                                    <input name="email_sekolah" id="email_sekolah"
                                                        placeholder="Masukkan email sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->email_sekolah ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="fax_sekolah" class="">Fax Sekolah</label>
                                                    <input name="fax_sekolah" id="fax_sekolah"
                                                        placeholder="Masukkan nomor faximile sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->fax_sekolah ?? null }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="web_sekolah" class="">Web Sekolah</label>
                                                    <input name="web_sekolah" id="web_sekolah"
                                                        placeholder="Masukkan email sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->web_sekolah ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="alamat_sekolah" class="">Alamat Sekolah</label>
                                                    <span class="text-danger">*</span>
                                                    <textarea name="alamat_sekolah" id="alamat_sekolah" class="form-control" cols="30" rows="7"
                                                        placeholder="Masukkan alamat lengkap sekolah">{{ $data['sekolah']->alamat_sekolah ?? null }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <label for="kota_sekolah" class="">Kota Sekolah</label> <span
                                                        class="text-danger">*</span>
                                                    <input name="kota_sekolah" id="kota_sekolah"
                                                        placeholder="Masukkan kota sekolah" type="text"
                                                        class="form-control"
                                                        value="{{ $data['sekolah']->kota_sekolah ?? null }}">
                                                </div>
                                            </div>
                                        </div>
                                        @if (isset($sekolah->logo_sekolah) == null || $sekolah->logo_sekolah == '')
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="logo_sekolah" class="">Logo Sekolah</label>
                                                        <input name="logo_sekolah" id="logo_sekolah"
                                                            placeholder="Masukkan kota sekolah" type="file"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <div class="position-relative form-group">
                                                        <label for="logo_sekolah" class="">Logo Sekolah</label>
                                                        <div id="upload-form" style="display:none;">
                                                            <input name="logo_sekolah" id="logo_sekolah"
                                                                placeholder="Masukkan kota sekolah" type="file"
                                                                class="form-control">
                                                        </div>
                                                        <div id="logo-images">
                                                            <br>
                                                            <img src="uploads/logo/{{ $data['sekolah']->logo_sekolah }}"
                                                                alt="" class="rounded img-fluid" width="150px">
                                                        </div>
                                                        <input type="checkbox" name="change_logo" id="change_logo"
                                                            class="mt-3"> Ganti logo?
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-primary btn-block" type="submit"><i
                                                        class="fa fa-check"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-md-4 col-lg-4 col-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Status PPDB</h5>
                            <form id="form-2" method="post">
                                @csrf
                                @method('patch')
                                <input type="hidden" name="id" id="id"
                                    value="{{ $data['sekolah']->id ?? null }}">
                                <div class="row">
                                    <div class="col-md-12">
                                        @if (isset($data['sekolah']->status_ppdb) == 1)
                                            <div class="alert alert-success">
                                                <b>Status PPDB Aktif!</b>
                                            </div>
                                        @else
                                            <div class="alert alert-warning">
                                                <b>Status PPDB Tidak Aktif!</b>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="status_ppdb" id="status_ppdb" class="form-control">
                                            <option value="1" @if (optional($sekolah)->status_ppdb == '1') selected @endif>Aktif
                                            </option>
                                            <option value="0" @if (optional($sekolah)->status_ppdb == '0') selected @endif>Tidak
                                                Aktif</option>
                                        </select>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@endsection

@section('js')
    <script>
        $("#change_logo").on('change', function() {
            if ($(this).is(':checked')) {
                $("#logo-images").slideUp();
                $("#upload-form").slideDown();
            } else {
                $("#logo-images").slideDown();
                $("#upload-form").slideUp();
            }
        });

        $("#form-1").submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ url('pengaturan_sekolah') }}',
                method: "post",
                dataType: 'json',
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                // beforeSend: function() {
                //     $(".loader").show();
                // },
                success: function(response) {
                    $(".loader").hide();

                    if (response.result == false) {
                        var form_error = response.form_error;
                        if (form_error.length != 0) {
                            for (i = 0; i < form_error.length; i++) {
                                toastr.error(form_error[i], response.message.head);
                            }
                        } else {
                            Swal.fire(
                                response.message.head,
                                response.message.body,
                                'error'
                            );
                        }
                    }

                    if (response.result == true) {
                        Swal.fire(
                            response.message.head,
                            response.message.body,
                            'success'
                        );

                        window.location.href = response.redirect;
                    }
                },
                // error: function() {
                //     alert("Error Data!");
                // }
            });
        });

        $("#form-2").submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();

            $.ajax({
                url: '{{ url('pengaturan_sekolah/update_ppdb') }}',
                method: 'POST',
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $(".loader").show();
                },
                success: function(response) {
                    $(".loader").hide();

                    if (response.result == true) {
                        Swal.fire(
                            response.message.head,
                            response.message.body,
                            'success'
                        );

                        window.location.href = response.redirect;
                    } else {
                        Swal.fire(
                            response.message.head,
                            response.message.body,
                            'error'
                        );

                        window.location.href = response.redirect;
                    }
                },
                // error: function() {
                //     alert('Error data!');
                // }
            });
        });

        $("#status_ppdb").on('change', function() {
            $("#form-2").submit();
        });
    </script>
@endsection
