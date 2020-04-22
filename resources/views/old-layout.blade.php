<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('meta-title', config('app.name') . ' | Blog')</title>
	<meta name="description" content="@yield('meta-description', 'Este es el blog de...')">
	<link rel="stylesheet" href="{{ asset('assets/page/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/page/css/framework.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/page/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/page/css/responsive.css') }}">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
</head>
<body>
	<div class="preload"></div>
	<header class="space-inter">
		<div class="container container-flex space-between">
			<figure class="logo"><img src="{{ asset('assets/zavala_aguilar_logo.png') }}" alt=""></figure>
			<nav class="custom-wrapper" id="menu">
				<div class="pure-menu"></div>
				<ul class="container-flex list-unstyled">
					<li><a href="{{ route('blog') }}" class="text-uppercase">Blog</a></li>
					<li><a href="about.html" class="text-uppercase">About</a></li>
					<li><a href="archive.html" class="text-uppercase">Archive</a></li>
					<li><a href="contact.html" class="text-uppercase">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>

	@yield('content')

	<section class="footer">
		<footer>
			<div class="container">
				<figure class="logo"><img src="{{ asset('assets/zavala_aguilar_logo.png') }}" alt=""></figure>
				<nav>
					<ul class="container-flex space-center list-unstyled">
						<li><a href="{{ route('blog') }}" class="text-uppercase c-white">Blog</a></li>
						<li><a href="about.html" class="text-uppercase c-white">about</a></li>
						<li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
						<li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
						@guest
							<li><a href="{{ route('login') }}" class="text-uppercase c-white">Iniciar Sesión</a></li>
							<li><a href="{{ route('register') }}" class="text-uppercase c-white">Crear Cuenta</a></li>
						@else
							<li><a href="{{ route('dashboard') }}" class="text-uppercase c-white">Dashboard</a></li>
						@endguest
					</ul>
				</nav>
				<div class="divider-2"></div>
				<p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
				<div class="divider-2" style="width: 80%;"></div>
				<p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-negro">Agencia De La Web</span></p>
				<ul class="social-media-footer list-unstyled">
					<li><a href="#" class="fb"></a></li>
					<li><a href="#" class="tw"></a></li>
					<li><a href="#" class="in"></a></li>
					<li><a href="#" class="pn"></a></li>
				</ul>
			</div>
		</footer>
	</section>
	
</body>
</html>