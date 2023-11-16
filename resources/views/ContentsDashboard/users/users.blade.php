<style>
    /* Your CSS styles here */
    .modal {
        transition-property: opacity, transform;
        transition-duration: 0.5s;
        transition-timing-function: ease-in-out;
    }


    .pagination-centered {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: -20px
    }

    /* .table th,
    .table td {
        max-width: 383px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    } */

    /* Mengurangi margin kanan dan kiri pada tabel */
    .table {
        margin-left: -30px;
        /* Atur sesuai kebutuhan Anda */
        margin-right: -30px;
        /* Atur sesuai kebutuhan Anda */
    }







    .search-highlight {
        font-weight: bold;
    }

    /* Loading spinner */
    #loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.7);
        z-index: 9999;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }

    .spinner {
        border: 4px solid rgba(0, 0, 0, 0.1);
        border-left: 4px solid #007bff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Transisi untuk modal saat muncul dan ditutup */
    .modal {
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .modal.fade .modal-dialog {
        transition: transform 0.3s ease;
    }

    .modal.fade.show {
        opacity: 1;
        visibility: visible;
    }

    .modal.fade.show .modal-dialog {
        transform: translate(0, 0);
    }

    .modal.fade .modal-dialog {
        transform: translate(0, -50px);
        /* Atur pergeseran vertikal */
    }

    .loading-text {
        margin-top: 10px;
        font-weight: bold;
        color: #333;
    }

    /* Mengatur warna teks dan latar belakang pada pagination */
    .pagination .page-item .page-link {
        color: white;
        /* Warna teks */
        background-color: orange;
        /* Warna latar belakang */
        border-color: orange;
        /* Warna garis bingkai (jika diperlukan) */
    }

    /* Mengatur teks tebal pada pagination */
    .pagination .page-item .page-link {
        font-weight: bold;
    }

    @media (max-width: 800px) {
        .card-tools {
            flex-direction: column;
            align-items: flex-start;
        }

        .d-flex.ml-auto {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    }

    @media (max-width: 700px) {
        .card-tools {
            align-items: center;
        }

        .input-group-lg {
            width: 100%;
            max-width: 100%;
            margin-right: 0 !important;
        }

        .hide-select {
            display: none;
        }
    }

    @media (max-width: 600px) {
        .card-tools {
            align-items: flex-start;
        }

        .input-group-lg {
            max-width: 100%;
        }

        .search-input-group {
            width: 100%;
        }
    }

    @media (max-width: 500px) {
        .input-group-lg {
            width: 100%;
            max-width: 100%;
        }
    }
</style>
</head>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <!-- Your breadcrumb content -->
            <div class="container-fluid">
                <div class="row mb-2">

                    {{-- BREADCUMB DI BAWAH --}}
                    <div class="col-sm-6">
                        <h1 class="m-0">Halaman Data Users</h1>
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active"><a href="">Halaman Data Users</a></li>
                        </ol>
                    </div>
                    {{-- BREADCUMB DI BAWAH --}}
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card card-orange">
                    <div class="card-header">
                        <h3 class="card-title" style="color: white; font-weight: 600">
                            Halaman Utama    Data Users
                        </h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus" style="color: white; font-weight: 600"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">


                        <!-- Data Table -->
                        <div class="card card-orange card-outline">
                            <div class="card-tools d-flex justify-content-between">
                                {{-- <div style="margin-top: 15px; margin-left: 10px">
                                <a href="{{ route('exportPdf') }}" id="cetakSemuaButton" class="button-85">
                                    <i class="fas fa-print"></i> Cetak Semua
                                </a>
                                <a href="{{ route('cetakPertanggal') }}" class="button-85">
                                    <i class="fas fa-print"></i> Cetak Per Periode
                                </a>
                            </div> --}}
                                {{-- <a href="{{ route('biayaKepegawaianBop.create') }}" class="button-85 ml-2"
                                    style="margin-right: 20px !important">
                                    Tambah Data <i class="fas fa-plus-square"></i>
                                </a> --}}
                            </div>

                            <div class="card-body">
                                <div class="card-body table-responsive p-0">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">

                                                <div class="card-header">
                                                    {{-- <h3 class="card-title">Fixed Header Table</h3> --}}
                                                    {{-- <button id="ubah-password" data-url="" class="button-31 "
                                                        style="color: white !important" data-toggle="modal"
                                                        data-target="#ubahPasswordModal">
                                                        <i class="fas fa-lock"></i> Ubah Password
                                                    </button> --}}

                                                    <a data-toggle="modal" id="ubah-password" data-toggle="modal" data-target="#ubahPasswordModal"
                                                    class="button-85 ml-2"
                                                    style="text-align: center !important; margin-left: -5px !important">
                                                    Ubah Password  <i class="fas fa-lock"></i>
                                                </a>


                                                    <a data-toggle="modal" data-target="#createUserModal"
                                                        class="button-85 ml-2"
                                                        style="text-align: center !important; margin-left: 10px !important">
                                                        Tambah Users  <i class="fas fa-plus-square"></i>
                                                    </a>

                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0" style="height: auto;">




                                                    <table
                                                        class="table text-center table-head-fixed table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Level</th>
                                                                <th>Email</th>
                                                                <th>Hobi</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>


                                                            @php
                                                                $i = 1;
                                                            @endphp




                                                            @foreach ($users as $user)
                                                                <tr>
                                                                    <th scope="row">{{ $i++ }}.</th>
                                                                    {{-- <th></th> --}}
                                                                    <td>


                                                                        {{ $user->name }}

                                                                    </td>
                                                                    {{-- <td>{{ date('d-m-Y', strtotime($user->tanggal)) }}</td> --}}
                                                                    <td>{{ $user->level }}
                                                                    </td>

                                                                    <td> {{ $user->email }} </td>
                                                                    <td> {{ $user->pertanyaan_keamanan }} </td>
                                                                    {{-- <td> {{ $user->id_pengajuan->id_pengajuan}} </td> --}}


                                                                    <td>
                                                                        <a data-toggle="modal"
                                                                            data-target="#editUserModal{{ $user->id }}"
                                                                            class="button-33 btn-sm" role="button">
                                                                            <i class="fas fa-pencil-alt"></i>
                                                                        </a>

                                                                        <form method="POST"
                                                                            action="{{ route('users.destroy', $user->id) }}"
                                                                            style="display: inline-block">
                                                                            @csrf
                                                                            <input name="_method" type="hidden"
                                                                                value="DELETE">
                                                                            <button title='Delete' type="submit"
                                                                                class="show_confirm button-32 btn-sm"
                                                                                data-toggle="tooltip">
                                                                                <i class="fas fa-trash"></i>
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endforeach


                                                        </tbody>

                                                    </table>



                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog"
                                aria-labelledby="ubahPasswordModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ubahPasswordModalLabel"><i class="fas fa-pen-square"></i> Ubah Password</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('update-password') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @elseif (session('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                <div class="mb-3">
                                                    <label for="oldPasswordInput" class="form-label">Password Lama</label>
                                                    <input name="old_password" type="password"
                                                        class="form-control @error('old_password') is-invalid @enderror"
                                                        id="oldPasswordInput" placeholder="Masukan Password Lama">
                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="newPasswordInput" class="form-label"> Password Baru</label>
                                                    <input name="password_baru" type="password"
                                                        class="form-control @error('password_baru') is-invalid @enderror"
                                                        id="newPasswordInput" placeholder="Masukan Password Baru">
                                                    @error('password_baru')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">
                                                    <label for="confirmNewPasswordInput" class="form-label">Konfirmasi Password Baru</label>
                                                    <input name="password_baru_confirmation" type="password"
                                                        class="form-control" id="confirmNewPasswordInput"
                                                        placeholder="Konfirmasi Password Baru">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="button-32"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="button-33">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                            @foreach ($users as $user)
                                <!-- Edit User Modal -->
                                <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editUserModalLabel{{ $user->id }}"
                                    aria-hidden="true">
                                    <!-- Isi modal untuk mengedit pengguna -->
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="editUserModalLabel{{ $user->id }}"><i class="fas fa-pen-square"></i> Edit User</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Isi formulir untuk mengedit pengguna -->
                                                    <div class="form-group">
                                                        <label  class="col-form-label">Nama:</label>
                                                        <input name="name" type="text" class="form-control"
                                                             value="{{ $user->name }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label  class="col-form-label">Level:</label>
                                                        <select name="level" class="form-control" >
                                                            <option value="Admin"
                                                                {{ $user->level === 'Admin' ? 'selected' : '' }}>Admin
                                                            </option>
                                                            <option value="Wakil Ketua II"
                                                                {{ $user->level === 'Wakil Ketua II' ? 'selected' : '' }}>
                                                                Wakil Ketua II</option>
                                                        </select>
                                                    </div>


                                                    <div class="form-group">
                                                        <label  class="col-form-label">Email:</label>
                                                        <input name="email"  type="email"
                                                            class="form-control" value="{{ $user->email }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label  class="col-form-label">Hobi:</label>
                                                        <input name="pertanyaan_keamanan"  type="text"
                                                            class="form-control" value="{{ $user->pertanyaan_keamanan }}">
                                                    </div>




                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="button-32"
                                                        data-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="button-33">Simpan </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            @endforeach



                            <!-- Create User Modal -->
                            <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog"
                                aria-labelledby="createUserModalLabel" aria-hidden="true">
                                <!-- Isi modal untuk membuat pengguna baru -->

                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route('users.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createUserModalLabel"><i class="fas fa-plus"></i> Tambah User</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi formulir untuk membuat pengguna baru -->

                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nama:</label>
                                                    <input name="name" id="name" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="level" class="col-form-label">Level:</label>
                                                    <select name="level" class="form-control" id="level">
                                                        <option selected disabled>Pilih Level</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="Wakil Ketua II">Wakil Ketua II</option>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <label for="email" class="col-form-label">Email:</label>
                                                    <input name="email" id="email" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label for="password" class="col-form-label">Password:</label>
                                                    <input name="password" id="password" type="text"
                                                        class="form-control">
                                                </div>

                                                <div class="form-group">
                                                    <label  class="col-form-label">Hobi:</label>
                                                    <input name="pertanyaan_keamanan"  type="text"
                                                        class="form-control" >
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="button-32"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="button-33">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>









        </section>
    </div>
