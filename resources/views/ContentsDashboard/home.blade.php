<style>
    .title-word {
        animation: color-animation 4s linear infinite !important;
    }

    .title-word-1 {
        --color-1: orange !important;
        --color-2: yellow !important;
        --color-3: white !important;
    }

    hr {
        border: 3px solid #000;
        margin: 20px 0;
        /* Atur jarak atas dan bawah dari garis */
    }

    .enlarge-image {
        position: relative;
        z-index: 1;
        /* Ubah z-index menjadi 1 untuk mengangkat gambar di atas elemen lain */
    }

    .enlarge-image:hover {
        z-index: 2;
        /* Ketika gambar diperbesar, tingkatkan z-index untuk memastikan tampil di atas elemen lain */
    }


    @keyframes color-animation {
        0% {
            color: var(--color-1)
        }

        32% {
            color: var(--color-1)
        }

        33% {
            color: var(--color-2)
        }

        65% {
            color: var(--color-2)
        }

        66% {
            color: var(--color-3)
        }

        99% {
            color: var(--color-3)
        }

        100% {
            color: var(--color-1)
        }
    }

    .count-number {
        font-size: 16px;
        /* Ubah ukuran font sesuai keinginan */
        color: orange;
        font-weight: 600;
        /* Ubah warna sesuai keinginan */
    }

    /* CSS untuk efek membesar pada gambar saat dihover */
    .enlarge-image {
        transition: transform 0.2s ease-in-out;
        /* Animasi transisi */
    }

    .enlarge-image:hover {
        transform: scale(1.1);
        /* Memperbesar gambar saat dihover */
    }
    .flexible-height {
        display: flex;
        flex-direction: column;
    }

    .flexible-height .card-body {
        flex-grow: 1;
        overflow-y: auto; /* Menambahkan scroll jika konten terlalu panjang */
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
                    <h1 class="m-0 title-word-1">Halaman Utama</h1>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a href="{{ url('') }}">Halaman Utama</a></li>
                    </ol>
                </div>
                {{-- BREADCUMB DI BAWAH --}}

                {{-- BREADCUMB DI SAMPING --}}
                {{-- <div class="col-sm-6">
                            <h1 class="m-0"> Halaman Beranda</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url("#") }}">Home</a></li>
                                <li class="breadcrumb-item active">Halaman Beranda</li>
                            </ol>
                        </div><!-- /.col --> --}}
                {{-- BREADCUMB DI SAMPING --}}
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    {{-- BREADCRUMB --}}


    <!-- !!! ISI HALAMAN KONTEN !!! -->
    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <!-- ./col -->
                @if (auth()->user()->level === 'Admin')
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3></h3>

                            <p style="color: white !important; font-weight: 700"> Halaman Pengajuan BOP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="{{ url('pengajuanBOP') }}" style="color: white !important;" class="small-box-footer">Lihat Detail <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @else
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-orange">
                        <div class="inner">
                            <h3></h3>

                            <p style="color: white !important; font-weight: 700">Halaman Pengajuan BOP</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion ion-cash"></i>
                        </div>
                        <a href="{{ url('beranda') }}" style="color: white !important;" class="small-box-footer">Hanya Bisa di Akses Admin <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                @endif
                <!-- ./col -->

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3></h3>

                            <p style="color: white !important; font-weight: 700">Halaman Realisasi Rinci BOP</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="{{ url('laporanRinciBop') }}" style="color: white !important;" class="small-box-footer">Lihat Detail <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                            {{-- <h3>65</h3> --}}
                            <h3></h3>
                            <p style="color: white !important; font-weight: 700">Halaman Mencetak Laporan</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="{{ url('cetakLaporan') }}" class="small-box-footer">Lihat Detail <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
               
               
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3></h3>

                                <p style="color: white !important; font-weight: 700">Halaman Logout</p>

                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>

                            <a href="#" class="small-box-footer" onclick="logout()">Lihat Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>

                        </div>
                    </div>
                    <!-- ./col -->

             
            </div>
            <!-- /.row -->
            {{-- SMALL BOX --}}


            <div class="callout callout-warning">
                <h5>
                    <i class="fas fa-home"></i> Selamat Datang {{ auth()->user()->name }} <i class="fas fa-home"></i>
                    <span style="float: right;">{{ now()->format('d-m-Y (H:i)') }}</span>
                </h5>
                Di Halaman Utama Sistem Informasi Keuangan STMIK Mardira Indonesia Tahun Periode <?php echo date('Y'); ?>.
            </div>

        </div>
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle "
                                    src="{{ asset('Logiin/logoo.png') }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">STMIK Mardira Indonesia</h3>

                            <p class="text-muted text-center">Lembaga Pendidikan Perguruan Tinggi</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Program Studi</b> <span class="float-right count-number"
                                        id="programStudiCount">0+</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Dosen</b> <span class="float-right count-number" id="dosenCount">0+</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Mahasiswa</b> <span class="float-right count-number"
                                        id="mahasiswaCount">0+</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Staff</b> <span class="float-right count-number" id="staffCount">0+</span>
                                </li>
                            </ul>


                            <a href="{{ url('https://stmik-mi.ac.id/#') }}" class="btn btn-warning btn-block"
                                style="color: white; font-weight: 700"><b>Website Resmi</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-warning flexible-height" >
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: 700; color: white;">Informasi Kampus</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Jurusan </strong>

                            <p class="text-muted">
                                Teknik Informatika Jenjang S1, Teknik Informatika Jenjang D3, Manajemen Informatika
                                Jenjang D3, dan Komputerisasi Akuntansi Jenjang D3.
                            </p>

                            <hr>

                            <strong style="margin-top: -10px !important"><i class="fas fa-map-marker-alt mr-1"></i>
                                Lokasi </strong>

                            <p class="text-muted">Jl. Soekarno Hatta Jl. Leuwi Panjang No.211, Situsaeur, Kec.
                                Bojongloa Kidul, Kota Bandung, Jawa Barat 40233</p>

                            <hr>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9 ">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills" >
                                <li class="nav-item"><a class="nav-link active" href="{{ url('#activity') }}"
                                        data-toggle="tab">Visi Dan Misi</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('#struktur') }}"
                                        data-toggle="tab">Struktur Organisasi</a></li>
                                <li class="nav-item"><a class="nav-link" href="https://stmik-mi.ac.id/akademik?nav=22" >Teachers & Staff</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('#timeline') }}"
                                        data-toggle="tab">Keuangan Lembaga</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('#keuangan') }}"
                                        data-toggle="tab"> Istilah Dalam Keuangan</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">


                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm enlarge-image"
                                                src="{{ asset('Logiin/logoo.png') }}" alt="user image">
                                            <span class="username">
                                                <a href="{{ url('#') }}">Visi </a>

                                            </span>
                                            <span class="description">{{ date('d-m-Y') }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            “Pada tahun 2025 Menjadi Perguruan Tinggi Unggul yang Mampu Memberikan
                                            Kontribusi dalam Pengembangan Teknologi Informasi bagi Pemerintah, Dunia
                                            Usaha dan Industri di Tingkat Nasional”
                                        </p>



                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post clearfix">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm enlarge-image"
                                                src="{{ asset('Logiin/logoo.png') }}" alt="User Image">
                                            <span class="username">
                                                <a href="{{ url('#') }}">Misi</a>
                                            </span>
                                            <span class="description">{{ date('d-m-Y') }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>

                                        <ol style="margin-left: -17px">
                                            <li>Menyelenggarakan pendidikan tinggi yang berkualitas di bidang teknologi
                                                informasi;</li>
                                            <li>Menyelenggarakan penelitian untuk membangun dan mengembangkan teknologi
                                                informasi sesuai dengan perkembangan teknologi global;</li>
                                            <li>Berperan aktif dalam kegiatan kemasyarakatan dalam memanfaatkan dan
                                                menerapkan teknologi informasi;</li>
                                            <li>Membangun jejaring kerjasama dengan pemerintah, dunia usaha dan
                                                industri serta berbagai institusi di bidang teknologi informasi.</li>
                                        </ol>

                                        </p>


                                    </div>
                                    <!-- /.post -->

                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm enlarge-image"
                                                src="{{ asset('Logiin/logoo.png') }}" alt="User Image">
                                            <span class="username">
                                                <a href="{{ url('#') }}">Foto Galeri Kampus</a>

                                            </span>
                                            <span class="description">Posted 4 photos </span>
                                        </div>

                                        {{-- FOTO --}}
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid mb-3 enlarge-image"
                                                    src="{{ asset('Logiin/stmik.jpg') }}" alt="Photo"
                                                    style="height: 282px;">
                                                    {{-- <div class="ribbon-wrapper ribbon-lg">
                                                        <div class="ribbon bg-success text-lg">
                                                          Ribbon
                                                        </div>
                                                      </div> --}}
                                            </div>

                                  
                                            <!-- /.col -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3 enlarge-image"
                                                            src="{{ asset('Logiin/stmik2.jpg') }}" alt="Photo"
                                                            style="height: 135px; width: 100%">
                                                        <img class="img-fluid mb-3 enlarge-image"
                                                            src="{{ asset('Logiin/stmik3.jpeg') }}" alt="Photo"
                                                            style="height: 133px; width: 100%">
                                                    </div>
                                                    <!-- /.col -->
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid mb-3 enlarge-image"
                                                            src="{{ asset('Logiin/stmik4.jpg') }}" alt="Photo"
                                                            style="height: 285px">
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <hr> --}}
                                            <p><strong>Sumber:</strong> <a href="https://stmik-mi.ac.id/">
                                                    https://stmik-mi.ac.id/</a></p>
                                        </div>
                                        {{-- FOTO --}}



                                    </div>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                Keuangan Lembaga Perguruan Tinggi
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i>
                                                    {{ now()->format('d-m-Y (H:i:s)') }} </span>

                                                <h3 class="timeline-header"><a href="{{ url('#') }}">Apa Itu
                                                        Keuangan Lembaga Perguruan Tinggi</a> </h3>

                                                <div class="timeline-body">
                                                    Keuangan lembaga perguruan tinggi merujuk pada pengelolaan aspek
                                                    keuangan yang terkait dengan operasi, pendanaan, investasi, dan
                                                    pelaporan keuangan institusi pendidikan tinggi. Ini mencakup
                                                    berbagai aktivitas keuangan yang berkaitan dengan pengumpulan dan
                                                    penggunaan dana, perencanaan anggaran, akuntansi, pelaporan
                                                    keuangan, dan analisis kinerja keuangan.
                                                </div>

                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i>
                                                    {{ now()->format('d-m-Y (H:i:s)') }} </span>

                                                <h3 class="timeline-header border-0"><a
                                                        href="{{ url('#') }}">Aspek-aspek penting dari keuangan
                                                        lembaga perguruan tinggi meliputi:</a>
                                                </h3>
                                                <div class="timeline-body">
                                                    <p><strong>Pendanaan:</strong> Mengelola sumber-sumber pendanaan,
                                                        termasuk modal sendiri, pinjaman, atau dana dari investor atau
                                                        pemberi dana lainnya.</p>

                                                    <p><strong>Investasi:</strong> Mengelola dana yang dimiliki oleh
                                                        lembaga dengan cara yang optimal untuk mencapai pertumbuhan dan
                                                        keuntungan jangka panjang. Ini mungkin melibatkan pengelolaan
                                                        portofolio investasi atau proyek-proyek yang menghasilkan
                                                        pendapatan.</p>

                                                    <p><strong>Pengeluaran:</strong> Mengelola pengeluaran lembaga,
                                                        termasuk biaya operasional, gaji karyawan, pembelian barang
                                                        atau jasa, dan pengeluaran lainnya.</p>

                                                    <p><strong>Pengumpulan Dana:</strong> Menyusun strategi dan taktik
                                                        untuk mengumpulkan dana dari berbagai sumber, termasuk
                                                        penjualan produk atau jasa, pendapatan dari investasi, atau
                                                        dukungan dari pihak ketiga.</p>

                                                    <p><strong>Pelaporan Keuangan:</strong> Menyiapkan laporan keuangan
                                                        yang akurat dan tepat waktu, termasuk laporan laba rugi,
                                                        neraca, arus kas, serta catatan-catatan yang mendukung. Laporan
                                                        ini penting untuk transparansi dan akuntabilitas kepada
                                                        pemangku kepentingan.</p>

                                                    <p><strong>Perencanaan Keuangan:</strong> Merencanakan penggunaan
                                                        dana dan sumber daya finansial dalam jangka pendek dan jangka
                                                        panjang, termasuk penetapan tujuan keuangan dan strategi untuk
                                                        mencapainya.</p>

                                                    <p><strong>Pengelolaan Risiko Keuangan:</strong> Mengidentifikasi
                                                        dan mengelola risiko finansial yang dapat mempengaruhi
                                                        kesehatan keuangan lembaga, seperti fluktuasi pasar, risiko
                                                        kredit, risiko likuiditas, dan lain-lain.</p>

                                                    <hr>

                                                    <p><b>Sumber Jurnal:</b> </p>

                                                    <p><strong>DOI:</strong>https://doi.org/10.55587/jla.v2i2.35</p>
                                                    <p><strong>DOI:</strong>https://doi.org/10.36549/ijis.v5i1.66</p>
                                                    <p><strong>ISSUE:</strong>Vol. 18 No. 1 (2019): Jurnal Ilmiah
                                                        Komputasi Volume: 18, No. 1, Maret 2019</p>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->

                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="keuangan">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                Istilah Dalam Keuangan
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i>
                                                    {{ now()->format('d-m-Y (H:i:s)') }}
                                                </span>

                                                <h3 class="timeline-header"><a href="{{ url('#') }}">Berikut
                                                        adalah istilah-istilah dalam bidang keuangan yang relevan untuk
                                                        lingkungan kampus: </a> </h3>

                                                <div class="timeline-body">
                                                    <p><strong>Surplus:</strong> Surplus terjadi ketika pendapatan atau
                                                        penerimaan melebihi pengeluaran atau biaya.</p>

                                                    <p><strong>Defisit:</strong> Defisit terjadi ketika pengeluaran
                                                        atau biaya melebihi pendapatan atau penerimaan.</p>

                                                    <p><strong>Aktiva:</strong> Sumber daya yang dimiliki oleh
                                                        perusahaan atau individu, termasuk uang, properti, investasi,
                                                        dan aset lainnya.</p>

                                                    <p><strong>Pasiva:</strong> Hutang atau kewajiban finansial yang
                                                        harus dibayar.</p>

                                                    <p><strong>Neraca:</strong> Laporan keuangan yang mencatat posisi
                                                        finansial pada suatu titik waktu, termasuk aktiva, pasiva, dan
                                                        ekuitas.</p>

                                                    <p><strong>Laporan Laba Rugi (Income Statement):</strong> Laporan
                                                        yang menunjukkan pendapatan, biaya, dan laba atau rugi bersih
                                                        dalam periode tertentu.</p>

                                                    <p><strong>Arus Kas:</strong> Laporan tentang aliran masuk dan
                                                        keluar uang tunai dalam periode tertentu.</p>

                                                    <p><strong>Ekuitas:</strong> Nilai sisa aset setelah dikurangi
                                                        kewajiban.</p>

                                                    <p><strong>Investasi:</strong> Alokasi dana untuk mendapatkan
                                                        keuntungan di masa depan, seperti saham, obligasi, dan
                                                        properti.</p>

                                                    <p><strong>Bunga:</strong> Pembayaran atas pinjaman atau pendapatan
                                                        dari investasi.</p>

                                                    <p><strong>Risiko:</strong> Potensi kerugian finansial atau
                                                        ketidakpastian dalam investasi.</p>

                                                    <p><strong>Likuiditas:</strong> Kemampuan aset diubah menjadi uang
                                                        tunai tanpa penurunan besar dalam nilainya.</p>

                                                    <p><strong>Inflasi:</strong> Kenaikan harga barang dan jasa dari
                                                        waktu ke waktu.</p>

                                                    <p><strong>Alokasi Aset:</strong> Pengaturan dana ke berbagai kelas
                                                        aset dalam portofolio.</p>

                                                    <p><strong>Kredit:</strong> Pinjaman yang harus dikembalikan dengan
                                                        bunga.</p>
                                                    <hr>

                                                    <p><b>Sumber Jurnal:</b> </p>
                                                    <p><strong>DOI:</strong>https://doi.org/10.55587/jla.v2i2.35</p>
                                                    <p><strong>DOI:</strong>https://doi.org/10.36549/ijis.v5i1.66</p>
                                                    <p><strong>ISSUE:</strong>Vol. 18 No. 1 (2019): Jurnal Ilmiah
                                                        Komputasi Volume: 18, No. 1, Maret 2019</p>
                                                </div>


                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->


                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->


                                <div class="tab-pane" id="struktur">
                                    <form class="form-horizontal">
                                        <img src="{{ asset('Logiin/struktur.jpg') }}" alt=""
                                            style="height: 770px; width: 100%">
                                    </form>
                                    <p><strong>Sumber:</strong> <a href="https://stmik-mi.ac.id/">
                                            https://stmik-mi.ac.id/</a></p>

                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->



                <!-- Main content -->
                <div class="invoice p-3 mb-3" style="width: 100%">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> STMIK MARDIRA INDONESIA
                                <small class="float-right">Tanggal: {{ date('d-m-Y') }}.</small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col ">

                            <address>
                                <strong>Hubungi</strong><br>
                                <a href="tel:0123-456-789"><i class="fa fa-phone"></i> +62 (022) 523 0382</a> <br>
                                <a href="info@stmik-mi.ac.id"><i class="fa fa-envelope"></i> info@stmik-mi.ac.id</a
                                    href="www.stmik-mi.ac.id"> <br>
                                <a href="www.stmik-mi.ac.id"><i class="fa fa-globe"></i> www.stmik-mi.ac.id</a
                                    href="www.stmik-mi.ac.id"> <br>
                                {{-- info@stmik-mi.ac.id<br>
                                 www.stmik-mi.ac.id<br> --}}
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col text-center">

                            <address>
                                <strong>Links</strong><br>
                                <a href="http://sister.stmik-mi.ac.id/auth/login"> Sister STMIKMI </a> <br>
                                <a href="https://jurnal.stmik-mi.ac.id/index.php/jcb"> e-Jurnal STMIKMI </a> <br>
                                <a href="https://stmik-mi.ac.id/akademik?nav=22"> Teachers & Staff </a> <br>
                                <a
                                    href="https://api.whatsapp.com/send/?phone=6281395121113&text&type=phone_number&app_absent=0">Support</a>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col text-right">
                            <b>Social Media</b><br>
                          
                            <a href="https://www.facebook.com/stmik.mardira"><i
                                    class="fas fa-facebook"></i>Facebook</a> <br>
                            <a href="https://twitter.com/stmikmardira"><i class="zmdi zmdi-twitter"></i>Twitter</a>
                            <br>
                            <a href="https://www.threads.net/@stmikmardira"><i
                                    class="zmdi zmdi-instagram"></i>Threads</a> <br>
                            <a href="https://www.instagram.com/stmikmardira"><i
                                    class="zmdi zmdi-instagram"></i>Instagram</a> <br>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->






                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->

</section>
<!-- /.content -->


</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->
<!-- !!! ISI HALAMAN KONTEN !!! -->
<script>
    function animateCount(elementId, finalValue, duration) {
        const element = document.getElementById(elementId);
        let currentValue = 0;
        const increment = Math.ceil(finalValue / (duration / 50)); // Menghitung increment berdasarkan durasi

        const interval = setInterval(function() {
            if (currentValue <= finalValue) {
                element.textContent = currentValue + "+";
                currentValue += increment;
            } else {
                element.textContent = finalValue + "+"; // Pastikan nilai akhir tepat
                clearInterval(interval);
            }
        }, 600); // Mengatur kecepatan animasi (ms)
    }

    document.addEventListener("DOMContentLoaded", function() {
        const duration = 600; // Durasi total animasi (ms)

        animateCount("programStudiCount", 4, duration);
        animateCount("dosenCount", 49, duration);
        animateCount("mahasiswaCount", 1406, duration);
        animateCount("staffCount", 28, duration);
    });
</script>
