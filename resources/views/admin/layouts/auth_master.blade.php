<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('admin') }}/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('admin') }}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{ asset('admin') }}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{ asset('admin') }}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('admin') }}/css/pace.min.css" rel="stylesheet" />
	<script src="{{ asset('admin') }}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('admin') }}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{ asset('admin') }}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="{{ asset('admin') }}/css/app.css" rel="stylesheet">
	<link href="{{ asset('admin') }}/css/icons.css" rel="stylesheet">
	<title>{{ env('APP_NAME') }} – @yield('title')</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="authentication-header"></div>
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<img src="{{ asset('admin') }}/images/logo-img.png" width="180" alt="" />
						</div>
						<div class="card">
							<div class="card-body">
								@yield('content')
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('admin') }}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ asset('admin') }}/js/jquery.min.js"></script>
	<script src="{{ asset('admin') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('admin') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('admin') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
	</script>
	<!--app JS-->
	<script src="{{ asset('admin') }}/js/app.js"></script>
</body>

</html>
