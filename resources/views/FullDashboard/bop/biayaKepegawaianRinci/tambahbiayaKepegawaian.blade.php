<!DOCTYPE html>
<html lang="en">

<head>
    @include('PartDashboard.head')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('AdminLTE/images/logoo.png') }}" alt="MardiraLogo" height="60"
                width="60">
            <p style="color: orange">Loading ...</p>
        </div>

        <!-- Navbar -->
        @include('PartDashboard.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('PartDashboard.sidebar')
        <!-- End Main Sidebar Container -->

        <!-- !!! ISI HALAMAN KONTEN !!! -->
        @include('ContentsDashboard.Bop.biayaKepegawaianRinci.tambahbiayaKepegawaian')
        <!-- !!! ISI HALAMAN KONTEN !!! -->

        <!-- Main Footer -->
        @include('PartDashboard.footer')
        <!-- Main Footer -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    @include('PartDashboard.script')
    @include('sweetalert::alert')

</body>

</html>
