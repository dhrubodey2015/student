<!DOCTYPE html>
<html lang="en">
	<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
	<head>
		<meta charset="utf-8" />
		<title> @yield('pageTitle') </title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--begin::Page Vendors Styles(used by this page)-->
		<link href="{{ asset('newTheme/plugins/custom/fullcalendar/fullcalendar.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<!--end::Page Vendors Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ asset('newTheme/plugins/global/plugins.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/plugins/custom/prismjs/prismjs.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/css/style.bundle1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ asset('newTheme/css/themes/layout/header/base/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/css/themes/layout/header/menu/light1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/css/themes/layout/brand/dark1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/css/themes/layout/aside/dark1894.css?v=7.1.9') }}" rel="stylesheet" type="text/css" />

		<link href="{{ asset('newTheme/plugins/custom/datatables/datatables.bundle1894.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/plugins/global/plugins.bundle1894.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('newTheme/plugins/custom/prismjs/prismjs.bundle1894.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		{{-- <link href="{{ asset('admin/assets/css/style.bundle9cd7.css?v=7.1.5') }}" rel="stylesheet" type="text/css" /> --}}
		<link href="{{ asset('newTheme/plugins/custom/datatables/datatables.bundle1894.css?v=7.1.5') }}" rel="stylesheet"
			  type="text/css"/>
        <!--end::Layout Themes-->
        <link rel="shortcut icon" href="{{ asset('newTheme/media/logos/favicon.ico') }}" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico" />
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    </head>
	<!--end::Head-->
	<!--begin::Body-->
    <body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed page-loading">
		<!-- Google Tag Manager (noscript) -->
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		<!-- End Google Tag Manager (noscript) -->
		<!--begin::Main-->
		<!--begin::Header Mobile-->
		<!--end::Header Mobile-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<!--begin::Header-->
					@include('layouts.header')

					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								@yield('content')
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					@include('layouts.footer')
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Main-->
		<!-- begin::User Panel-->
		<div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
			<!--begin::Header-->
			<div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                <h3 class="font-weight-bold m-0">Customer</h3>
				<a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
					<i class="ki ki-close icon-xs text-muted"></i>
				</a>
			</div>
			<!--end::Header-->
			<!--begin::Content-->
			<div class="offcanvas-content pr-5 mr-n5">
				<!--begin::Header-->
				<div class="d-flex align-items-center mt-5">
					<!-- <div class="symbol symbol-100 mr-5">
						<div class="symbol-label" style="background-image:url('{{ asset('newTheme/media/users/300_21.jpg') }}">
					</div> 
						<i class="symbol-badge bg-success"></i>-->
					</div>
					<div class="d-flex flex-column">
						<a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{ Auth::user()->name }}</a>
						<div class="navi mt-2">
							<a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24" />
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
												</g>
											</svg>
											<!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">{{ @Auth::user()->email }}</span>
								</span>
							</a>
							<a href="{{ route('logout') }}" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign Out</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
						</div>
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Separator-->
				<div class="separator separator-dashed mt-8 mb-5"></div>
				<!--end::Separator-->
				<!--begin::Nav-->

				<!--end::Nav-->
				<!--begin::Separator-->
				<div class="separator separator-dashed my-7"></div>
				<!--end::Separator-->
				<!--begin::Notifications-->

				<!--end::Notifications-->
			</div>
			<!--end::Content-->
		</div>
		<!-- end::User Panel-->

		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop">
			<span class="svg-icon">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24" />
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
		<!--begin::Page Vendors(used by this page)-->
		<script src="{{ asset('newTheme/plugins/custom/fullcalendar/fullcalendar.bundle1894.js?v=7.1.9') }}"></script>
		<!--end::Page Vendors-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('newTheme/js/pages/widgets1894.js?v=7.1.9') }}"></script>
		<!--end::Page Scripts-->
		<script src="{{ asset('newTheme/plugins/global/plugins.bundle1894.js?v=7.1.9') }}"></script>
		<script src="{{ asset('newTheme/plugins/custom/prismjs/prismjs.bundle1894.js?v=7.1.9') }}"></script>
		<script src="{{ asset('newTheme/js/scripts.bundle1894.js?v=7.1.9') }}"></script>
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ asset('newTheme/plugins/custom/datatables/datatables.bundle1894.js?v=7.1.9') }}"></script>
		<!--end::Page Scripts-->
		@if(Session::has('message'))
			<script>
				toastr.success("{{Session::get('message')}}");
			</script>
		@endif
		@yield('scripts')
	</body>
	<!--end::Body-->
<!-- Mirrored from preview.keenthemes.com/metronic/demo1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Feb 2021 06:51:59 GMT -->
</html>
