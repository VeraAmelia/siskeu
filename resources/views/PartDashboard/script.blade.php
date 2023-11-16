<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
{{-- TOASTR --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/plugins/sparklines/sparkline.js') }}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- dropzonejs -->
<script src="{{ asset('AdminLTE/plugins/dropzone/min/dropzone.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('AdminLTE/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('/AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('AdminLTE/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- InputMask -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('AdminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('AdminLTE/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.js') }}"></script>

{{-- SWEETALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="{{ asset('AdminLTE/dist/js/pages/dashboard.js') }}"></script> --}}
{{-- DATATABLE --}}
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-rc.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker@3.1.0/daterangepicker.min.js"></script>






<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>

{{-- TOASTR LOGIN --}}
@if (Session::has('login'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('login') }}", 'Selamat Datang 😀', {
            timeout: 13000
        });
        // toastr.info("{{ Session::get('login') }}", 'Selamat Datang 🙏', {
        //     timeout: 14000
        // });
        // toastr.warning("{{ Session::get('login') }}", 'Selamat Datang 🙏', {
        //     timeout: 14000
        // });
        // toastr.error("{{ Session::get('login') }}", 'Selamat Datang 🙏', {
        //     timeout: 14000
        // });
    </script>
@endif
{{-- END TOASTR LOGIN --}}

{{-- TOASTR SIMPAM --}}
@if (Session::has('simpan'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.success("{{ Session::get('simpan') }}", 'Berhasil !', {
            timeout: 13000
        });
    </script>
@endif
{{-- END TOASTR SIMPAM --}}



{{-- TOASTR HAPUS --}}
@if (Session::has('hapus'))
    <script>
        toastr.options = {
            "progressBar": true,
            "closeButton": true,
        }
        toastr.error("{{ Session::get('hapus') }}", 'Berhasil', {
            timeout: 13000
        });
    </script>
@endif
{{-- TOASTR HAPUS --}}
{{-- END TOASTR --}}

{{-- SWEET ALERT LOGOUT --}}
<script>
    function logout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Anda yakin ingin keluar?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('logout') }}";
            }
        });
    }
</script>
{{-- SWEET ALERT LOGOUT --}}

{{-- FORMAT RUPIAH ON INPUT --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var inputElements = document.querySelectorAll(".format-rupiah");

        inputElements.forEach(function(input) {
            input.addEventListener("input", function() {
                var value = this.value.replace(/[^\d]/g, ""); // Hilangkan karakter non-angka
                var formattedValue = value === "" ? "" : parseInt(value).toLocaleString(
                    "id-ID");
                this.value = formattedValue;
            });

            input.addEventListener("keypress", function(event) {
                var keyCode = event.keyCode;
                if (keyCode < 48 || keyCode > 57) {
                    event.preventDefault(); // Mencegah memasukkan karakter non-angka
                }
            });
        });
    });
</script>
{{-- END FORMAT RUPIAH ON INPUT --}}

{{-- SHOW PENDAPATAN BULANAN --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#show-lapbul', function() {
            var userURL = $(this).data('url');
            $.get(userURL, function(data) {
                $('#userShowModal').modal('show');
                //  $('#user-unsurbiaya').text(data.unsurbiaya);
                $('#user-nama_perkiraan').val(data.nama_perkiraan);

                var formattedDateAwal = '(' + formatDateWithMonthName(data.tanggal_awal) + ')';
                var formattedDateAkhir = '(' + formatDateWithMonthName(data.tanggal_akhir) +
                    ')';
                $('#user-tanggal').val(formattedDateAwal + ' - ' + formattedDateAkhir);


                if (data.grandtotal !== undefined) {
                    $('#user-grandtotal').val(formatRupiah(data.grandtotal));
                }

            });
        });
    });

    function formatDateWithMonthName(date) {
        var d = new Date(date);
        var day = d.getDate();
        var monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
        var month = monthNames[d.getMonth()];
        var year = d.getFullYear();

        return day + ' - ' + month + ' - ' + year;
    }


    function formatRupiah(angka) {
        var number_string = angka.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }
</script>
{{-- END SHOW PENDAPATAN BULANAN --}}
{{-- END SCRIPT UNTUK SHOW MODAL --}}

{{-- SCRIPT UNTUK SHOW MODAL --}}
{{-- SHOW BOP --}}
<script type="text/javascript">
    $(document).ready(function() {

        $('body').on('click', '#show-bop', function() {
            var userURL = $(this).data('url');
            $.get(userURL, function(data) {
                $('#userShowModal').modal('show');
                //  $('#user-unsurbiaya').text(data.unsurbiaya);
                $('#user-unsurbiaya').val(data.unsurbiaya);
                $('#user-tanggal').val(moment(data.tanggal).format('DD-MM-YYYY'));
                $('#user-pengajuan').val(formatRupiah(data
                    .pengajuan)); // Mengubah format Rupiah
                $('#user-keterangan').text(data.keterangan);
            });
        });

    });

    function formatRupiah(angka) {
        var number_string = angka.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }
</script>
{{-- SHOW BOP --}}

{{-- SHOW PEMASUKAN BOP --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#show-rincibop', function() {
            var userURL = $(this).data('url');
            $.get(userURL, function(data) {
                $('#userShowModal').modal('show');
                //  $('#user-unsurbiaya').text(data.unsurbiaya);
                $('#user-uraian').val(data.uraian);
                $('#user-tanggal').val(formatDate(data.tanggal)); // Memformat tanggal

                if (data.jumlahusulan !== undefined) {
                    $('#user-jumlahusulan').val(formatRupiah(data.jumlahusulan));
                }

                if (data.jumlahrealisasi !== undefined) {
                    $('#user-jumlahrealisasi').val(formatRupiah(data.jumlahrealisasi));
                }

                if (data.jumlahsisa !== undefined) {
                    $('#user-jumlahsisa').val(formatRupiah(data.jumlahsisa));
                }

                $('#user-petugas').val(data.petugas);
                $('#user-keterangan').val(data.keterangan);
            });
        });
    });

    function formatDate(date) {
        var d = new Date(date);
        var day = d.getDate();
        var month = d.getMonth() + 1; // Month is zero-based
        var year = d.getFullYear();

        return day + ' - ' + month + ' - ' + year;
    }

    function formatRupiah(angka) {
        var number_string = angka.toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return 'Rp ' + rupiah;
    }
</script>
{{-- END SHOW PEMASUKAN BOP --}}
{{-- END SCRIPT UNTUK SHOW MODAL --}}

{{-- SWEET ALERT HAPUS --}}
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();

        Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang sudah dihapus tidak akan kembali lagi.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!',
                cancelButtonText: 'Batalkan!'
            })

            .then((willDelete) => {
                if (willDelete.isConfirmed) {
                    form.submit();
                    Swal.fire(
                        'Berhasil!',
                        'Data anda berhasil di hapus.',
                        'success',
                    )
                }
            })
    });
</script>
{{-- END SWEET ALERT HAPUS --}}

{{-- PENGURANGAN INPUT JUMLAH PENGAJUAN - JUMLAH REALISASI --}}
<script>
    // Fungsi untuk menghitung jumlah sisa      
    function calculate() {
        var txt1 = document.getElementById('txt1').value.replace(/\./g, '').replace(/Rp /g, ''); // Remove dots and 'Rp'
        var txt2 = document.getElementById('txt2').value.replace(/\./g, '').replace(/Rp /g, ''); // Remove dots and 'Rp'

        var pengajuan = parseInt(txt1.replace(/\D/g, '')); // Remove non-numeric characters
        var realisasi = parseInt(txt2.replace(/\D/g, '')); // Remove non-numeric characters

        var sisa = pengajuan - realisasi;

        if (!isNaN(sisa)) {
            document.getElementById('txt3').value = formatRupiah(sisa.toString());
        } else {
            document.getElementById('txt3').value = ''; // Clear the input if NaN
        }
    }
       
</script>
{{-- END PENGURANGAN INPUT JUMLAH PENGAJUAN - JUMLAH REALISASI --}}

{{-- DROPDOWN OPTION UNSUR BIAYA --}}
<script>
    $(document).ready(function() {
        $('.select2').select2({
            tags: true // Allow custom tags (manual input)
        });

        $('#uraianselect2').on('change', function() {
            var selectedValue = $(this).val();

            if (selectedValue == 'a. Rumah Tangga dan Perlengkapan') {
                $('#dropdownOptions').show();
            } else {
                $('#dropdownOptions').hide();
            }

            if (selectedValue == 'b. ATK') {
                $('#atkOptions').show();
            } else {
                $('#atkOptions').hide();
            }

            if (selectedValue == 'c. Transportasi') {
                $('#transOptions').show();
            } else {
                $('#transOptions').hide();
            }

            if (selectedValue == 'e. Internet') {
                $('#subDropdownOptions').show();
            } else {
                $('#subDropdownOptions').hide();
            }

            if (selectedValue == 'g. Partisipasi Keamanan dan Kebersihan') {
                $('#keamananOptions').show();
            } else {
                $('#keamananOptions').hide();
            }
        });

        // Initialize the state of the dropdownOptions based on the current value
        if ($('#uraianselect2').val() == 'a. Rumah Tangga dan Perlengkapan') {
            $('#dropdownOptions').show();
        }

        if ($('#uraianselect2').val() == 'b. ATK') {
            $('#atkOptions').show();
        }
        
        if ($('#uraianselect2').val() == 'c. Transportasi') {
            $('#transOptions').show();
        }

        if ($('#uraianselect2').val() == 'e. Internet') {
            $('#subDropdownOptions').show();
        }

        if ($('#uraianselect2').val() == 'g. Partisipasi Keamanan dan Kebersihan') {
            $('#keamananOptions').show();
        }
    });
</script>
{{-- END DROPDOWN OPTION UNSUR BIAYA --}}


{{-- PERKALIAN BIAYA SPP DATERANGE --}}
<script>
    $(document).ready(function() {
        $('.select2').select2({
            tags: true // Allow custom tags (manual input)
        });

        $('#uraianselect').on('change', function() {
            if ($(this).val() == 'Perwalian dan Registrasi') {
                $('#biayaSppInput').show();
            } else {
                $('#biayaSppInput').hide();
                $('#biayaSpp1').val('');
                $('#biayaSpp2').val('');
            }
            updateGrandtotal();
        });

        $('#biayaSpp1, #biayaSpp2').on('keyup', function() {
            updateGrandtotal();
        });

        $('#reservation').daterangepicker({
            opens: 'left',
            startDate: moment().startOf('month'),
            endDate: moment().endOf('month'),
            locale: {
                format: 'D-MM-YYYY',
                separator: ' - ',
                applyLabel: 'Terapkan',
                cancelLabel: 'Batal',
                fromLabel: 'Dari',
                toLabel: 'Hingga',
                customRangeLabel: 'Pilih Rentang Tanggal',
                daysOfWeek: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
                monthNames: [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ],
                monthNamesShort: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt',
                    'Nov', 'Des'
                ],
                firstDay: 1
            }
        });

        $('#reservation').on('apply.daterangepicker', function(ev, picker) {
            $('#tanggal_awal').val(picker.startDate.format('YYYY-MM-DD'));
            $('#tanggal_akhir').val(picker.endDate.format('YYYY-MM-DD'));
        });

        function updateGrandtotal() {
            var biayaSpp1 = parseFloat($('#biayaSpp1').val().replace(/[^\d]/g, ""));
            var biayaSpp2 = parseFloat($('#biayaSpp2').val().replace(/[^\d]/g, ""));
            var grandtotal = biayaSpp1 * biayaSpp2;
            $('#grandtotal').val(formatRupiah(grandtotal));
        }

        function formatRupiah(angka) {
            var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            if (split.length > 1) {
                rupiah += ',' + split[1];
            }
            return rupiah;
        }
    });
</script>
{{-- PERKALIAN BIAYA SPP DATERANGE --}}
