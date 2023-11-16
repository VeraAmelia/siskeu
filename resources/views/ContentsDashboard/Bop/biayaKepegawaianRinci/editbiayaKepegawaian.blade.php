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
                            <h1 class="m-0">Halaman Edit</h1>
                            <ol class="breadcrumb ">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item active"><a href="">Halaman Edit</a></li>
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
                                    class="fas fa-pencil-ruler"></i> Halaman Edit Biaya Kepegawaian (BOP)
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
                                    <form action="{{ route('biayaRinciKepegawaian.update', $bop->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label>Unsur Biaya</label>
                                            <select class="form-control select2" style="width: 100%;" id="uraianselect2" name="unsurbiaya">
                                                <option value="">Pilih Unsur Biaya atau Ketik Manual</option>
                                                <option value="a. Honorarium Kelas Khusus" {{ $bop->unsurbiaya == 'a. Honorarium Kelas Khusus' ? 'selected' : '' }}>a. Honorarium Kelas Khusus</option>
                                                <option value="b. Uang Makan dan Transport" {{ $bop->unsurbiaya == 'b. Uang Makan dan Transport' ? 'selected' : '' }}>b. Uang Makan dan Transport</option>
                                                <option value="c. BPJS Ketenagakerjaan" {{ $bop->unsurbiaya == 'c. BPJS Ketenagakerjaan' ? 'selected' : '' }}>c. BPJS Ketenagakerjaan</option>
                                                <option value="d. BPJS Kesehatan" {{ $bop->unsurbiaya == 'd. BPJS Kesehatan' ? 'selected' : '' }}>d. BPJS Kesehatan</option>
                                                <option value="e. Biaya Duka/Suka Cita" {{ $bop->unsurbiaya == 'e. Biaya Duka/Suka Cita' ? 'selected' : '' }}>e. Biaya Duka/Suka Cita</option>
                                                <option value="f. Biaya Pengembangan SDM" {{ $bop->unsurbiaya == 'f. Biaya Pengembangan SDM' ? 'selected' : '' }}>f. Biaya Pengembangan SDM</option>
                                            </select>
                                        </div>
                                        
                                        {{-- <div class="form-group">
                                            <label>Biaya Kepegawaian</label>
                                            <select class="form-control select2" style="width: 100%;" id="jabatan_id"
                                                name="jabatan_id">
                                                <option disabled value="">Pilih Jabatan</option>
                                                <option  value="{{ $bop->jabatan_id }}">{{ $bop->jabatan->jabatan }}</option>
                                              
                                                @foreach ($jab as $item)
                                                    <option value="{{ $item->id }}">{{ $item->jabatan }}</option>
                                                @endforeach
        
                                            </select>
                                        </div> --}}
                                       
                                        

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
                                <a href="{{ route('laporanRinciBop.index') }}" class="button-31" style="color: white !important">Kembali</a>
                            </div>
                            </form>

                        </div>



                        <div class="card-footer" style="margin-top: -25px">
                            Halaman <a href="#">Edit Biaya Kepegawaian (BOP)</a> Lembaga STMIK Mardira Indonesia.
                        </div>

                    </div>
                    <!-- /.card -->





                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- !!! ISI HALAMAN KONTEN !!! -->
