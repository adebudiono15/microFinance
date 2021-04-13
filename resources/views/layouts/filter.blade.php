<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ url('assets/img/logo.png') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ url('assets/js/plugin/webfont/	webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/pdf.css') }}">
    <link rel="stylesheet" href="{{ url('assets/js/plugin/datatables/jquery.dataTables.min.css') }}">
    

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="{{ url('assets/css/demo.css') }}">
    @stack('css')
</head>
<body>
	<div class="wrapper">
		<div class="">
		</div>


            @yield('content')
            @include('layouts.footer')
		
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ url('assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ url('assets/js/core/popper.min.js') }}"></script>
	<script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ url('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ url('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
	<script src="{{ url('assets/js/plugin/chart.js/chart.min.js') }}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{ url('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>

	<!-- Chart Circle -->
	<script src="{{ url('assets/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
    <script src="{{ url('assets/js/plugin/datatables/datatables.min.js') }}"></script>
    


	<!-- jQuery Vector Maps -->
	<script src="{{ url('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
	<script src="{{ url('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ url('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ url('assets/js/atlantis.min.js') }}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{ url('assets/js/setting-demo.js') }}"></script>

	<script src="{{ url('assets/js/sweetalert2.js') }}"></script>
	<script>
        @if(Session::has('lebih'))
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Ups... GAGAL.!',
        text: 'Uang Bayar Melebihi Sisa',
        showConfirmButton: false,
        timer: 3500
        })
        @endif
        @if(Session::has('success'))
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Berhasil Menambah Data',
        showConfirmButton: false,
        timer: 3500
        })
        @endif
        @if(Session::has('update'))
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Data Diupdate',
        showConfirmButton: false,
        timer: 3500
        })
        @endif
        @if(Session::has('delete'))
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Data Dihapus',
        showConfirmButton: false,
        timer: 3500
        })
        @endif
        @if(Session::has('detail'))
        Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Ups Ada Yang Salah!',
        showConfirmButton: false,
        timer: 3500
        })
        @endif
    </script>
    @stack('js')
</body>
</html>