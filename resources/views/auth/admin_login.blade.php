
<!DOCTYPE html>

<html lang="en">
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Student Management | Admin Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<link href="{{ asset('admin/assets_log/css/pages/login/login-1.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('admin/assets_log/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="{{ asset('admin/assets_log/media/logos/favicon.ico') }}" />
	</head>
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<div class="d-flex flex-column flex-root">
			<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<div class="login-aside d-flex flex-column flex-row-auto" style="background-color: #F2C98A;">
					<div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
						<a href="#" class="text-center mb-10">
							<img src="{{ asset('admin/assets_log/media/logos/logo-letter-1.png') }}" class="max-h-70px" alt="" />
						</a>
						<h3 class="font-weight-bolder text-center font-size-h4 font-size-h1-lg" style="color: #986923;">Discover Student Management
						<br />with great build tools</h3>
					</div>
					<div class="aside-img d-flex flex-row-fluid bgi-no-repeat bgi-position-y-bottom bgi-position-x-center" style="background-image: url(admin/assets_log/media/svg/illustrations/login-visual-1.svg)"></div>
				</div>
				<div class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
					<div class="d-flex flex-column-fluid flex-center">
						<div class="login-form login-signin">
							<form method="POST" action="{{ route('admin.login.check') }}">
                        		@csrf
								<div class="pb-13 pt-lg-0 pt-5">
									<h3 class="font-weight-bolder text-dark font-size-h4">Welcome to Student Management <br>Admin Login</h3>
									<!-- <span class="text-muted font-weight-bold font-size-h4">New Here?
									<a href="{{ route('register') }}" class="text-primary font-weight-bolder">Create an Account</a></span> -->
								</div>
								<div class="form-group">
									<label class="font-size-h6 font-weight-bolder text-dark">Email</label>
									<input id="email" type="email" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('email') is-invalid @enderror" placeholder="E-Mail ID" name="email" value="{{ old('email') }}" autocomplete="off" required autofocus/>
									@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between mt-n5">
										<label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
										<!-- @if (Route::has('password.request'))
										<a href="{{ route('password.request') }}" class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5" id="kt_login_forgot">Forgot Password ?</a>
										@endif -->
									</div>
									<input id="password" type="password" class="form-control form-control-solid h-auto py-6 px-6 rounded-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" autocomplete="off" />
									@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                	@enderror
								</div>

								<div class="form-group row">
		                            <div class="col-md-6">
		                                <div class="form-check">
		                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

		                                    <label class="form-check-label" for="remember">
		                                        {{ __('Remember Me') }}
		                                    </label>
		                                </div>
		                            </div>
		                        </div>
								<div class="pb-lg-0 pb-5">
									<button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
								</div>
							</form>
						</div>
						
					</div>
					
				</div>
			</div>
		</div>
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
		<script src="{{ asset('admin/assets_log/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets_log/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets_log/js/scripts.bundle.js') }}"></script>
		<script src="{{ asset('admin/assets_log/js/pages/custom/login/login-general.js') }}"></script>
	</body>
</html>





