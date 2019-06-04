  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Griever.be | Admin')</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
    <!-- Custom styles for this template-->
    <link href="{{asset('/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/admin.css')}}" rel="stylesheet">
    {{-- <link href="{{asset('/css/admin.css')}}" rel="stylesheet"> --}}
    @yield('head')
  </head>
<body id="page-top">

    <!-- Page Wrapper -->
   <div id="wrapper">

		@include('layouts.admin-sidebar')
		<div id="content-wrapper" class="d-flex flex-column">

				<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				@include('layouts.admin-topbar')
				<!-- End of Topbar -->
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							@include('../shared/flash-message')
							@yield('content')
						</div>
					</div>
				</div>
				
				
      </div>
        <!-- Footer -->
        @include('layouts.admin-footer')
        <!-- End of Footer -->
		</div>
	</div>

    <!-- Bootstrap core JavaScript-->
    <script
          src="https://code.jquery.com/jquery-3.3.1.min.js"
          integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
          crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <!-- DropzoneJs Plugin -->
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
    <script src="{{ asset('/js/dropzone-config.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/sb-admin-2.min.js')}}"></script>

@yield('js')
  


</body>

</html>