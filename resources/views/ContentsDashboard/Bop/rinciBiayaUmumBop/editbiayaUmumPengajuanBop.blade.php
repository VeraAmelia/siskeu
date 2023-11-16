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
                            <h1 class="m-0">Halaman Edit </h1>
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active"><a href="">Halaman Edit </a></li>
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
                            <h3 class="card-title" style="color: white; font-weight: 600"><i class="fas fa-pencil-ruler"></i> Halaman Edit Biaya Umum (BOP) </h3>

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
                                    <form action="{{ route('rinciBiayaUmumBop.update', $bop->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Unsur Biaya</label>
                                            <select class="form-control select2" style="width: 100%;" id="uraianselect2" name="unsurbiaya">
                                                <option value="">Pilih Unsur Biaya atau Ketik Manual</option>
                                                <option value="a. Rumah Tangga dan Perlengkapan" {{ $bop->unsurbiaya == 'a. Rumah Tangga dan Perlengkapan' ? 'selected' : '' }}>a. Rumah Tangga dan Perlengkapan</option>
                                                <option value="b. ATK" {{ $bop->unsurbiaya == 'b. ATK' ? 'selected' : '' }}>b. ATK</option>
                                                <option value="c. Transportasi" {{ $bop->unsurbiaya == 'c. Transportasi' ? 'selected' : '' }}>c. Transportasi</option>
                                                <option value="d. Pemeliharaan Gedung/Fasilitas" {{ $bop->unsurbiaya == 'd. Pemeliharaan Gedung/Fasilitas' ? 'selected' : '' }}>d. Pemeliharaan Gedung/Fasilitas</option>
                                                <option value="e. Internet" {{ $bop->unsurbiaya == 'e. Internet' ? 'selected' : '' }}>e. Internet</option>
                                                <option value="f. PLN" {{ $bop->unsurbiaya == 'f. PLN' ? 'selected' : '' }}>f. PLN</option>
                                                <option value="g. Partisipasi Keamanan dan Kebersihan" {{ $bop->unsurbiaya == 'g. Partisipasi Keamanan dan Kebersihan' ? 'selected' : '' }}>g. Partisipasi Keamanan dan Kebersihan</option>
                                                <option value="h. Pulsa Operasional" {{ $bop->unsurbiaya == 'h. Pulsa Operasional' ? 'selected' : '' }}>h. Pulsa Operasional</option>
                                                <option value="i. Token Listrik" {{ $bop->unsurbiaya == 'i. Token Listrik' ? 'selected' : '' }}>i. Token Listrik</option>
                                                <option value="j. Telkom" {{ $bop->unsurbiaya == 'j. Telkom' ? 'selected' : '' }}>j. Telkom</option>
                                                <option value="k. Biaya Admin Bank" {{ $bop->unsurbiaya == 'k. Biaya Admin Bank' ? 'selected' : '' }}>k. Biaya Admin Bank</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="dropdownOptions" style="display: none;">
                                            <label>Pilih Jenis Rumah Tangga dan Perlengkapan</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailbiaya">
                                                <option value="a.1. Konsumsi" {{ $bop->detailbiaya == 'a.1. Konsumsi' ? 'selected' : '' }}>a.1. Konsumsi</option>
                                                <option value="a.2. Air Mineral" {{ $bop->detailbiaya == 'a.2. Air Mineral' ? 'selected' : '' }}>a.2. Air Mineral</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="subDropdownOptions" style="display: none;">
                                            <label>Detail Biaya Internet</label>
                                            <select class="form-control select2" style="width: 100%;" name="detailinternet">
                                                <option value="e.1. Paket Internet" {{ $bop->detailbiaya == 'e.1. Paket Internet' ? 'selected' : '' }}>e.1. Paket Internet</option>
                                                <option value="e.2. Kecepatan Tambahan" {{ $bop->detailbiaya == 'e.2. Kecepatan Tambahan' ? 'selected' : '' }}>e.2. Kecepatan Tambahan</option>
                                                <option value="e.3. Peralatan Jaringan" {{ $bop->detailbiaya == 'e.3. Peralatan Jaringan' ? 'selected' : '' }}>e.3. Peralatan Jaringan</option>
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
                                                    placeholder="Masukan Tanggal" value="{{ $bop->tanggal }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="petugas">Petugas</label>
                                            <small>(Teks)</small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i>
                                                    </span>
                                                </div>
                                                <input type="text" name="petugas" autocomplete="off" class="form-control"
                                                    id="petugas" placeholder="Masukan Nama Petugas" value="{{ $bop->petugas }}">
                                            </div>
                                        </div>
                                        

                                </div>
                                <!-- /.col -->
                                {{-- KONTEN KIRI --}}


                                {{-- KONTEN KANAN --}}
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="pengajuan"> Jumlah Pengajuan</label>
                                        <small>(Angka)</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                            </div>
                                            <input id="txt1" oninput="calculate()" type="text" name="pengajuan" class="form-control format-rupiah"
                                                id="pengajuan" autocomplete="off" value="{{ number_format($bop->pengajuan, 0, ',', '.') }}" placeholder="Masukan Jumlah Pengajuan" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="pengajuan"> Jumlah Realisasi</label>
                                        <small>(Angka)</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                            </div>
                                            <input id="txt2" oninput="calculate()" type="text" name="realisasi" class="form-control format-rupiah"
                                                id="realisasi" autocomplete="off" value="{{ number_format($bop->realisasi, 0, ',', '.') }}" placeholder="Masukan Jumlah Realisasi" required>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="pengajuan"> Jumlah Sisa</label>
                                        <small>(Jumlah Pengajuan - Jumlah Realisasi)</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                            </div>
                                            <input type="text" name="sisa" value="{{ number_format($bop->sisa, 0, ',', '.') }}" autocomplete="off" class="form-control format-rupiah" id="txt3" readonly>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.col -->
                                {{-- KONTEN KANAN --}}
                            </div>
                            <!-- /.row -->

                            <label for="keterangan">Keterangan</label>
                            <small>(Kalimat)</small>
                            <textarea class="form-control" name="keterangan" placeholder="Masukan Keterangan" id="keterangan" rows="4" >{{ $bop->keterangan }}</textarea>

                            <div class="form-group mt-3">
                                <button class="button-33">Simpan</button>
                                <a href="{{ route('pengajuanBOP.index') }}" class="button-31" style="color: white !important">Kembali</a>
                            </div>
                            </form>

                        </div>



                        <div class="card-footer" style="margin-top: -25px">
                            Halaman <a href="#">Edit Biaya Umum (BOP)</a> Lembaga STMIK Mardira Indonesia.
                        </div>

                    </div>
                    <!-- /.card -->





                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- !!! ISI HALAMAN KONTEN !!! -->
