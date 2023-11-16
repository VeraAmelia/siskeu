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
        {{-- @include('ContentsDashboard.home') --}}
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
                                    class="fas fa-plus-circle"></i> Tambah Biaya Umum Biaya Operasional

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
                                    <form action="{{ route('biayaUmumPengajuanBop.store') }}" method="POST">
                                        {{-- @csrf --}}
                                        {{ csrf_field() }}
                                        <!-- IP mask -->

                                        <div class="form-group">
                                            <label>Biaya Umum</label>
                                            <select class="form-control select2" style="width: 100%;" id="uraianselect2" name="unsurbiaya">
                                                <option value="">Pilih Unsur Biaya atau Ketik Manual</option>
                                                <option value="a. Rumah Tangga dan Perlengkapan">a. Rumah Tangga dan Perlengkapan</option>
                                                <option value="b. ATK">b. ATK</option>
                                                <option value="c. Transportasi">c. Transportasi</option>
                                                <option value="d. Pemeliharaan Gedung/Fasilitas">d. Pemeliharaan Gedung/Fasilitas</option>
                                                <option value="e. Internet">e. Internet</option>
                                                <option value="f. PLN">f. PLN</option>
                                                <option value="g. Partisipasi Keamanan dan Kebersihan">g. Partisipasi Keamanan dan Kebersihan</option>
                                                <option value="h. Pulsa Operasional">h. Pulsa Operasional</option>
                                                <option value="i. Token Listrik">i. Token Listrik</option>
                                                <option value="j. Telkom">j. Telkom</option>
                                                <option value="k. Biaya Admin Bank">k. Biaya Admin Bank</option>
                                            </select>
                                        </div>
                                      
        
                                        <div class="form-group" id="dropdownOptions" style="display: none;">
                                            <label>Pilih Jenis Rumah Tangga dan Perlengkapan</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailbiaya">
                                                <option value="a.1. Konsumsi">a.1. Konsumsi</option>
                                                <option value="a.2. Air Mineral">a.2. Air Mineral</option>
                                                <option value="a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)">a.3. Perlengkapan Rumah Tangga (Tisu, Sabun, Kopi, Teh, dll)</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="atkOptions" style="display: none;">
                                            <label>Detail Biaya ATK</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailatk">
                                                <option value="b.1. Bussines File">b.1. Bussines File</option>
                                                <option value="b.2. Pulpen">b.2. Pulpen</option>
                                                <option value="b.3. Ketas A4">b.3. Ketas A4</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="transOptions" style="display: none;">
                                            <label>Detail Biaya Transportasi</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailtransportasi">
                                                <option value="c.1. Bensin Mobil STMIK (Transportasi)">c.1. Bensin Mobil STMIK (Transportasi)</option>
                                                <option value="c.2. Parkir (Transportasi)">c.2. Parkir (Transportasi)</option>
                                                <option value="c.3. Transport Belanja ART (Transportasi)">c.3. Transport Belanja ART (Transportasi)</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="subDropdownOptions" style="display: none;">
                                            <label>Detail Biaya Internet</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailinternet">
                                                <option value="e.1. Paket Internet">e.1. Paket Internet</option>
                                                <option value="e.2. Kecepatan Tambahan">e.2. Kecepatan Tambahan</option>
                                                <option value="e.3. Peralatan Jaringan">e.3. Peralatan Jaringan</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="keamananOptions" style="display: none;">
                                            <label>Detail Pilihan</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailkeamanan">
                                                <option value="g.1. Iuran RT">g.1. Iuran RT</option>
                                                <option value="g.2. Kebersihan UPT">g.2. Kebersihan UPT</option>
                                                <option value="g.3. Sampah Keliling">g.3. Sampah Keliling</option>
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
                            Halaman <a href="#">Tambah Biaya Umum (BOP)</a> Lembaga STMIK Mardira Indonesia.
                        </div>

                    </div>
                    <!-- /.card -->





                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- !!! ISI HALAMAN KONTEN !!! -->
