<!DOCTYPE html>
<html lang="en">
<head>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= '../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');</script>
		<meta charset="utf-8" />
		<title>Metronic Live preview | Keenthemes</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle9cd7.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/plugins/global/plugins.bundle9cd7.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/plugins/custom/prismjs/prismjs.bundle9cd7.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets/css/style.bundle9cd7.css?v=7.1.5') }}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="https://preview.keenthemes.com/metronic/theme/html/demo9/dist/assets/media/logos/favicon.ico" />
</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
		<noscript>
			<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>
		@include('sidebar')
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-row flex-column-fluid page">
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
					<div id="kt_header" class="header flex-column header-fixed">
						<div class="header-top">
							<div class="container">
								<div class="d-none d-lg-flex align-items-center mr-3">
									<a href="index.html" class="mr-20">
										<img alt="Logo" src="{{asset('admin/assets/media/logos/logo-letter-9.png')}}" class="max-h-35px" />
									</a>
								</div>
							</div>
						</div>
						<div class="header-bottom">
							<div class="container">
								<div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
									<div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
										<ul class="menu-nav">
											<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="hover" aria-haspopup="true">
												<a href="javascript:;" class="menu-link menu-toggle">
													<span class="menu-text">Components</span>
													{{-- <span class="menu-desc">All Components &amp; and Adding Components</span> --}}
													<i class="menu-arrow"></i>
												</a>
												<div class="menu-submenu menu-submenu-classic menu-submenu-left">
													<ul class="menu-subnav">
														<li class="menu-item">
															<a href="{{ route('add.components') }}" class="menu-link">Add Components</a>
														</li>
														<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
															<a href="javascript:;" class="menu-link menu-toggle">
																<span class="menu-text">All Components</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu menu-submenu-classic menu-submenu-right">
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('ssd') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">SSD</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('hdd') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">HDD</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('cpu') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">CPU</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('chesis') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Chesis</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
														<li class="menu-item menu-item-submenu" data-menu-toggle="hover" aria-haspopup="true">
															<a href="javascript:;" class="menu-link menu-toggle">
																<span class="menu-text">Servers</span>
																<i class="menu-arrow"></i>
															</a>
															<div class="menu-submenu menu-submenu-classic menu-submenu-right">
																<ul class="menu-subnav">
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('create.server') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">Create New Server</span>
																		</a>
																	</li>
																	<li class="menu-item" aria-haspopup="true">
																		<a href="{{ route('servers') }}" class="menu-link">
																			<i class="menu-bullet menu-bullet-dot">
																				<span></span>
																			</i>
																			<span class="menu-text">All Servers</span>
																		</a>
																	</li>
																</ul>
															</div>
														</li>
													</ul>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="m-2">


						@yield('content')
					
					
					</div>
					<div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
						<div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
							<div class="text-dark order-2 order-md-1">
								<span class="text-muted font-weight-bold mr-2">2020©</span>
								<a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary">Keenthemes</a>
							</div>
							<div class="nav nav-dark order-1 order-md-2">
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pr-3 pl-0">About</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link px-3">Team</a>
								<a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-3 pr-0">Contact</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<script src="{{ asset('admin/assets/plugins/global/plugins.bundle9cd7.js?v=7.1.5') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/prismjs/prismjs.bundle9cd7.js?v=7.1.5') }}"></script>
		<script src="{{ asset('admin/assets/js/scripts.bundle9cd7.js?v=7.1.5') }}"></script>
		<script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle9cd7.js?v=7.1.5') }}"></script>
		<script src="{{ asset('admin/assets/js/pages/crud/datatables/basic/paginations9cd7.js?v=7.1.5') }}"></script>
		<script src="{{ asset('admin/assets/js/pages/crud/forms/widgets/bootstrap-datepicker9cd7.js?v=7.1.5') }}"></script>
		@if(Session::has('message'))
			<script>
				toastr.success("{{Session::get('message')}}");
			</script>
		@endif
		@yield('scripts')
	</body>

</html>