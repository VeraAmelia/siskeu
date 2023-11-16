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
                                    class="fas fa-plus-circle"></i>Halaman Tambah Rinci Laporan Pengeluaran BOP
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
                                    <form action="{{ route('pengeluaranbop.store') }}" method="POST">
                                        {{-- @csrf --}}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="jumlahusulan"> Jumlah Usulan</label>
                                            <small>(Angka)</small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                                </div>
                                                <input id="txt1" oninput="calculate()" type="text" name="jumlahusulan" class="form-control format-rupiah"
                                                    id="jumlahusulan" autocomplete="off" placeholder="Masukan Unsur Biaya" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="jumlahrealisasi"> Jumlah Realisasi</label>
                                            <small>(Angka)</small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                                </div>
                                                <input id="txt2" oninput="calculate()" type="text" name="jumlahrealisasi" class="form-control format-rupiah"
                                                    id="jumlahrealisasi" autocomplete="off" placeholder="Masukan Unsur Biaya" >
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="pengajuan"> Jumlah Sisa</label>
                                            <small>(Jumlah Pengajuan - Jumlah Realisasi)</small>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><span class="rupiah">Rp.</span></span>
                                                </div>
                                                <input type="text" name="jumlahsisa" autocomplete="off" class="form-control format-rupiah" id="txt3"
                                                    placeholder="Masukan Pengajuan" readonly>
                                            </div>
                                        </div>
                                        
                                        

                                </div>
                                <!-- /.col -->
                                {{-- KONTEN KIRI --}}


                                {{-- KONTEN KANAN --}}
                                <div class="col-md-6">

                                    <!-- IP mask -->
                                    <div class="form-group">
                                        <label for="uraian"> Uraian</label>
                                        <small>(Teks)</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="uraian" class="form-control" id="uraian"
                                                placeholder="Masukan Pengajuan" >
                                        </div>
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
                                                placeholder="Masukan Pengajuan" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="petugas"> Petugas</label>
                                        <small>(Teks)</small>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i>
                                                </span>
                                            </div>
                                            <input type="text" name="petugas" class="form-control" id="petugas"
                                                placeholder="Masukan Pengajuan"  autocomplete="off">
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
                                <a href="{{ route('pengeluaranbop.index') }}" class="button-31" style="color: white !important">Kembali</a>
                            </div>
                            </form>

                        </div>



                        <div class="card-footer" style="margin-top: -25px">
                            Halaman <a href="#">Tambah Rinci Laporan Pengeluaran BOP</a> Lembaga STMIK Mardira Indonesia.
                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                        </div>

                    </div>
                    <!-- /.card -->





                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- !!! ISI HALAMAN KONTEN !!! -->
