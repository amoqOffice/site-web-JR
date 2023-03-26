<!DOCTYPE html>
<html lang="en">
<head>
	<title>Blogzine - Blog and Magazine Bootstrap 5 Theme</title>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Webestica.com">
	<meta name="description" content="Bootstrap based News, Magazine and Blog Theme">

	<!-- Dark mode -->
	<script>
		const storedTheme = localStorage.getItem('theme')

		const getPreferredTheme = () => {
			if (storedTheme) {
				return storedTheme
			}
			return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
		}

		const setTheme = function (theme) {
			if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
				document.documentElement.setAttribute('data-bs-theme', 'dark')
			} else {
				document.documentElement.setAttribute('data-bs-theme', theme)
			}
		}

		setTheme(getPreferredTheme())

		window.addEventListener('DOMContentLoaded', () => {
		    var el = document.querySelector('.theme-icon-active');
			if(el != 'undefined' && el != null) {
				const showActiveTheme = theme => {
				const activeThemeIcon = document.querySelector('.theme-icon-active use')
				const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
				const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

				document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
					element.classList.remove('active')
				})

				btnToActive.classList.add('active')
				activeThemeIcon.setAttribute('href', svgOfActiveBtn)
			}

			window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
				if (storedTheme !== 'light' || storedTheme !== 'dark') {
					setTheme(getPreferredTheme())
				}
			})

			showActiveTheme(getPreferredTheme())

			document.querySelectorAll('[data-bs-theme-value]')
				.forEach(toggle => {
					toggle.addEventListener('click', () => {
						const theme = toggle.getAttribute('data-bs-theme-value')
						localStorage.setItem('theme', theme)
						setTheme(theme)
						showActiveTheme(theme)
					})
				})

			}
		})

	</script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="{{ asset('assets/front/images/favicon.ico') }}">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

	<!-- Plugins CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/font-awesome/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/bootstrap-icons.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/tiny-slider.css') }}">

	<!-- Theme CSS -->
	<link id="style-switch" rel="stylesheet" type="text/css" href="{{ asset('assets/front/css/style.css') }}">

</head>

<body>

<!-- HEADER -->
@include('front/layouts/header')

<!-- CONTENT -->
<main>
    @yield('content')
</main>

<!-- FOOTER -->
@include('front/layouts/footer')

<!-- =======================
Cookies alert START -->
<div class="alert alert-light alert-dismissible fade show position-fixed bottom-0 start-50 translate-middle-x z-index-99 d-lg-flex justify-content-between align-items-center shadow p-4 col-9 col-md-5" role="alert">
	<p class="m-0 pe-3">This website stores cookies on your computer. To find out more about the cookies we use, see our <a class="text-reset" href="#"> <u>Privacy Policy</u></a></p>
	<div class="d-flex mt-3 mt-lg-0">
		<button type="button" class="btn btn-success-soft btn-sm mb-0 me-2" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">Accept</span>
		</button>
		<button type="button" class="btn btn-danger-soft btn-sm mb-0" data-bs-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">Decline</span>
		</button>
	</div>
</div>
<!-- =======================
Cookies alert END -->

<!-- Back to top -->
<div class="back-top"><i class="bi bi-arrow-up-short"></i></div>

<!-- =======================
JS libraries, plugins and custom scripts -->

<!-- Bootstrap JS -->
<script src="{{ asset('assets/front/js/bootstrap.bundle.min.js') }}"></script>

<!-- Vendors -->
<script src="{{ asset('assets/front/js/tiny-slider.js') }}"></script>

<!-- Template Functions -->
<script src="{{ asset('assets/front/js/functions.js') }}"></script>
</body>
</html>
