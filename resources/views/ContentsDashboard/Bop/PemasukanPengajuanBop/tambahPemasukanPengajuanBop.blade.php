<style>
    .rupiah {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: bold;
        max-width: 18px;
        text-align: center;
        justify-content: center;
        margin-left: -5px;
        border-color: #ffc107;
    }

    .is-warning {
        border-color: #ffc107;
    }

    .input-group-x {
        display: flex;
        align-items: center;
    }

    .input-group-x .x-symbol {
        margin: 0 10px;
        font-weight: bold;
    }

    .input-group-prepend {
        margin-right: -2px;
        /* Menyesuaikan margin jika diperlukan */
    }

    .x-symbol {
        font-weight: bold;
        padding: 0 5px;
    }
</style>


{{-- BREADCRUMB --}}
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                {{-- BREADCUMB DI BAWAH --}}
                <div class="col-sm-6">
                    <h1 class="m-0">Halaman Tambah </h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="">Halaman Tambah </a></li>
                    </ol>
                </div>
                {{-- BREADCUMB DI BAWAH --}}

            </div>
        </div>
    </div>
    {{-- BREADCRUMB --}}


    <!-- !!! ISI HALAMAN KONTEN !!! -->
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-orange">
                <div class="card-header">
                    <h3 class="card-title" style="color: white; font-weight: 600"><i class="fas fa-plus-circle"></i>
                        Halaman Tambah Biaya Kepegawaian (BOP)
                    </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus" style="color: white; font-weight: 600"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        {{-- KONTEN KIRI --}}
                        <div class="col-md-6">
                            <form action="{{ route('biayaKepegawaian.store') }}" method="POST">
                                {{-- @csrf --}}
                                {{ csrf_field() }}
                                <!-- IP mask -->

                                {{-- <div class="form-group">
                                    <label for="unsurbiaya">Unsur Biaya</label>
                                    <small>(Teks)</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="unsurbiaya" autocomplete="off" class="form-control"
                                            id="unsurbiaya" placeholder="Masukan Unsur Biaya" >
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label>Biaya Kepegawaian</label>
                                    <select class="form-control select2" style="width: 100%;" id="uraianselect2"
                                        name="unsurbiaya">
                                        <option value="">Pilih Unsur Biaya atau Ketik Manual</option>
                                        <option value="a. Honorarium Kelas Khusus">a. Honorarium Kelas Khusus</option>
                                        <option value="b. Uang Makan dan Transport">b. Uang Makan dan Transport</option>
                                        <option value="c. BPJS Ketenagakerjaan">c. BPJS Ketenagakerjaan</option>
                                        <option value="d. BPJS Kesehatan">d. BPJS Kesehatan</option>
                                        <option value="e. Biaya Duka/Suka Cita">e. Biaya Duka/Suka Cita</option>
                                        <option value="f. Biaya Pengembangan SDM">f. Biaya Pengembangan SDM</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Biaya Kepegawaian</label>
                                    <select class="form-control select2" style="width: 100%;" id="jabatan_id"
                                        name="jabatan_id">
                                        <option disabled value="">Pilih Jabatan</option>
                                      
                                        @foreach ($jab as $item)
                                            <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                        @endforeach

                                    </select>
                                </div>


                                <div class="form-group" id="dropdownOptions" style="display: none;">
                                    <label>Detail Biaya Pengembangan SDM</label>
                                    <select class="form-control select2" style="width: 100%;" name="detailbiaya">
                                        <option value="- kursi">- kursi</option>
                                        <option value="- meja">- meja</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label for="tanggal"> Tanggal</label>
                                    <small>(Date)</small>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                        <input type="date" name="tanggal" class="form-control" id="tanggal"
                                            placeholder="Masukan Tanggal">
                                    </div>
                                </div>



                        </div>
                        <!-- /.col -->
                        {{-- KONTEN KIRI --}}


                        {{-- KONTEN KANAN --}}
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="pengajuan"> Pengajuan</label>
                                <small>(Angka)</small>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><span class="rupiah">Rp.</span>
                                        </span>
                                    </div>
                                    <input type="text" name="pengajuan" autocomplete="off"
                                        class="form-control format-rupiah" id="pengajuan"
                                        placeholder="Masukan Pengajuan">
                                </div>
                            </div>




                        </div>
                        <!-- /.col -->
                        {{-- KONTEN KANAN --}}
                    </div>
                    <!-- /.row -->

                    <label for="keterangan">Keterangan</label>
                    <small>(Kalimat)</small>
                    <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan" id="keterangan" rows="4"></textarea>

                    <div class="form-group mt-3">
                        <button class="button-33">Simpan</button>
                        <a href="{{ route('biayaKepegawaianBop.index') }}" class="button-31"
                            style="color: white !important">Kembali</a>
                    </div>
                    </form>

                </div>



                <div class="card-footer" style="margin-top: -25px">
                    Halaman <a href="#">Tambah Biaya Kepegawaian (BOP)</a> Lembaga STMIK Mardira Indonesia.
                </div>

            </div>
            <!-- /.card -->





        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- !!! ISI HALAMAN KONTEN !!! -->
