<style>
    .rupiah {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: bold;
        max-width: 18px;
        text-align: center;
        justify-content: center;
        margin-left: -5px
        border-color: #ffc107;

    }

    .is-warning {
        border-color: #ffc107;
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
            <!-- /.content-header -->


            <!-- !!! ISI HALAMAN KONTEN !!! -->
            <!-- Main content -->

            <section class="content">
                <div class="container-fluid">

                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-orange">
                        <div class="card-header">
                            <h3 class="card-title" style="color: white; font-weight: 600"><i
                                    class="fas fa-plus-circle"></i> Halaman Tambah Sarana Prasarana (BOP)
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
                                    <form action="{{ route('saPrasaranaBop.store') }}" method="POST">
                                        {{-- @csrf --}}
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label>Biaya Umum</label>
                                            <select class="form-control select2" style="width: 100%;" id="uraianselect2" name="unsurbiaya">
                                                <option value="">Pilih Unsur Biaya atau Ketik Manual</option>
                                                <option value="a. Kebutuhan Sewa Gedung Perkuliah Baru">a. Kebutuhan Sewa Gedung Perkuliah Baru</option>
                                                <option value="b. Kebutuhan Kursi Meja Dosen">b. Kebutuhan Kursi Meja Dosen</option>
                                                <option value="c. Kebutuhan Kursi Meja Mahasiswa">c. Kebutuhan Kursi Meja Mahasiswa</option>
                                                <option value="d. Kebutuhan Kursi Meja Rapat">d. Kebutuhan Kursi Meja Rapat</option>
                                                <option value="e. Kebutuhan Kursi Sofa Tamu">e. Kebutuhan Kursi Sofa Tamu</option>
                                                <option value="f. Kebutuhan AC">f. Kebutuhan AC</option>
                                                <option value="g. Kebutuhan Laptop">g. Kebutuhan Laptop</option>
                                                <option value="h. Kebutuhan Desk Computer">h. Kebutuhan Desk Computer</option>
                                                <option value="i. Kebutuhan Infocus">i. Kebutuhan Infocus</option>
                                                <option value="j. Kebutuhan Printer">j. Kebutuhan Printer</option>
                                                <option value="k. Kebutuhan Mesin Fotocopy">k. Kebutuhan Mesin Fotocopy</option>
                                                <option value="l. Kebutuhan CCTV dan Instalasinya">l. Kebutuhan CCTV dan Instalasinya</option>
                                                <option value="m. Kebutuhan Instalasi Listrik/Telp/IT">m. Kebutuhan Instalasi Listrik/Telp/IT</option>
                                                <option value="n. Kebutuhan Kendaraan Roda Empat">n. Kebutuhan Kendaraan Roda Empat</option>
                                                <option value="o. Kebutuhan Kendaraan Roda Dua">o. Kebutuhan Kendaraan Roda Dua</option>
                                                <option value="p. Pengembangan IT">p. Pengembangan IT</option>
                                              
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
                                            <input type="text" name="pengajuan" autocomplete="off" class="form-control format-rupiah" id="pengajuan"
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
                            <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan" id="keterangan" rows="4" ></textarea>

                            <div class="form-group mt-3">
                                <button class="button-33">Simpan</button>
                                <a href="{{ route('pengajuanBOP.index') }}" class="button-31" style="color: white !important">Kembali</a>
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
