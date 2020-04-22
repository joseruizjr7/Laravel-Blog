<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="@yield('meta-description', 'Este es el blog de...')">
	<title>@yield('meta-title', config('app.name') . ' | Blog')</title>

	<!-- Bootstrap -->
	<link href='https://fonts.googleapis.com/css?family=Noto+Serif:400italic,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="{{ asset('assets/blog/assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" >
	<link href="{{ asset('assets/blog/assets/css/font-awesome.min.css') }}" rel="stylesheet" >
	<link href="{{ asset('assets/blog/assets/css/magnific-popup.css') }}" rel="stylesheet" >
	<link href="{{ asset('assets/blog/assets/css/style.min.css') }}" rel="stylesheet" >
	<link href="{{ asset('assets/blog/assets/css/skin/skin-skyblue.min.css') }}" rel="stylesheet" >
	<link href="" rel="stylesheet">
	
</head>
  <body class="home blog">
    <div id="page" class="site">
      <a class="skip-link screen-reader-text" href="#content">Skip to content</a>

      <div class="site-header-affix-wrapper">
        <header id="masthead" class="site-header header-dark" role="banner">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-sm-3">
                <div class="site-branding">
                  <!-- //site-title when you use logo image.
                  <h1 class="site-title title-image"><a href="index.html" rel="home"><img src="assets/img/danish-image-logo.png" alt="Danish."></a></h1>
                  -->
                  <figure class=""><img class="my-2" style="width:5cm; margin-top:50px;" src="{{ asset('assets/zavala_aguilar_logo.png') }}" alt=""></figure>
                  <!-- //site-description if you wanna use it.
                  <p class="site-description">Traveler and Young Designer //</p>
                  -->
                </div><!-- .site-branding -->
              </div><!-- .col-sm-4 -->

              <div class="col-sm-9">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                  <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-align-left"></i><span class="sr-only">Primary Menu</span></button>

                  <div class="menu-testing-menu-container">
                    <ul id="primary-menu" class="menu nav-menu" aria-expanded="false">
                      
					  <li class="menu-item"><a href="{{ route('blog') }}">Blog</a></li>
					  @guest
						<li class="menu-item"><a href="{{ route('register') }}">Crear Cuenta</a></li>
                      	<li class="menu-item"><a href="{{ route('login') }}">Iniciar Sesión</a></li>
					  @endguest
                      @auth
						  @if ( auth()->user()->hasRole(['Administrador', 'Analista', 'Escritor']) )
						  <li class="menu-item"><a href="{{ route('dashboard') }}">Administración</a></li>
						  @endif
						  <li class="menu-item"><a href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a></li>
						  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					  @endauth
                      {{-- <li class="menu-item"><a href="contact.html">Contact</a></li> --}}
                      
                    </ul>
                  </div>
                </nav><!-- #site-navigation -->
              </div><!-- .col-sm-8 -->
            </div><!-- .row -->
          </div><!-- .container -->
        </header><!-- #masthead -->
      </div><!-- .site-header-affix-wrapper -->

      {{-- <!-- #header -->
      <section id="header" style="background-image: url('assets/img/danish-image-header.jpg');">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <blockquote>
                <p>Mendapatkan hati wanita cantik itu tidak mudah, apalagi jika kamu tidak terlalu lucu ~</p>
                <small>Tarjono</small>
              </blockquote>
            </div>
          </div>
        </div>
        <div class="overlay"></div>
      </section><!-- #header --> --}}

      @yield('content')

      {{-- <!-- partner -->
      <section id="partner" class="section-partner">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-unstyled brand-img">
                <li>
                  <div class="brand-container"><img src="assets/img/danish-image-client-01.png" alt="Everest"></div>
                </li>   
                <li>      
                  <div class="brand-container"><img src="assets/img/danish-image-client-02.png" alt="Lemon juice"></div>
                </li>   
                <li>
                  <div class="brand-container"><img src="assets/img/danish-image-client-01.png" alt="Everest"></div>
                </li>   
                <li>
                  <div class="brand-container"><img src="assets/img/danish-image-client-02.png" alt="Lemon juice"></div>
                </li>
              </ul>
            </div><!-- .col-md-12 -->
          </div><!-- .row -->
        </div><!-- .container -->
      </section><!-- #partner --> --}}

      <!-- site-footer -->
      <footer id="colophon" class="site-footer" role="contentinfo" style="background-color:black; ">
        <div class="container">
          <div class="row">
            <div class="col-sm-3">
              <section class="widget widget_tag_cloud">
                <h3 class="widget-title">Tags</h3>
                <div class="tagcloud">
					@php
						$tags = App\Tag::all()
					@endphp
					@foreach ($tags as $tag)
					<a href="{{ route('tags.show', $tag->url) }}">{{ $tag->name }}</a>
				@endforeach
                </div>
              </section><!-- .widget_tag_cloud -->
            </div><!-- .col-sm-3 -->

            <div class="col-sm-3">
              <section class="widget widget_recent_entries">
                <h3 class="widget-title">Headline</h3>
                <ul>
					@if (Route::currentRouteName() == 'blog.post')
						@foreach ($suggestedPosts as $post)
							<li>
								<a href="{{ route('blog.post', ['post' => $post]) }}">{{ $post->title }}</a>
								<span class="post-date">{{ $post->published_at->format('M d, Y') }}</span>
							</li>
						@endforeach
					@endif
					@if (Route::currentRouteName() == 'blog')
						@foreach ($recentPosts as $post)
							<li>
								<a href="{{ route('blog.post', ['post' => $post]) }}">{{ $post->title }}</a>
								<span class="post-date">{{ $post->published_at->format('M d, Y') }}</span>
							</li>
						@endforeach
					@endif
					
                </ul>
              </section><!-- .widget_recent_entries -->
            </div><!-- .col-sm-3 -->

            <div class="col-sm-6">
              <section class="widget danish_widget_site_info">
                <div class="site-info">
					<img class="my-2" style="width:5cm; margin-top:50px;" src="{{ asset('assets/zavala_aguilar_logo.png') }}" alt="">
                  <p>1024 Main Street, Jjrn Plrt Btl<br>+62 (123) 456-7890</p>
                  <br>
                  <p class="muted">© 2016 Brand Inc.</p>
                  <a href="#">Terms of Service</a> <span>/</span> <a href="#">Privacy</a>
                </div><!-- .site-info -->
              </section><!-- .danish_widget_site_info -->
            </div><!-- .col-sm-6 -->
          </div><!-- .row -->
        </div><!-- .container -->
      </footer><!-- #site-footer -->

      <!-- copyright -->
      <section id="copyright" class="copyright">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 copy-left">
              Copyright © 2016 <a href="#"><strong>Zavala Aguilar</strong></a>. All Right Reserved.
            </div><!-- .col-sm-6 -->

            <div class="col-sm-6 copy-right">
              <ul class="social-icon">
                <li><a href="http://twitter.com/_templateninja" target="_blank" class="icon-twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="https://www.facebook.com/Template-Ninja-1555671317979815" target="_blank" class="icon-facebook"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="#" target="_blank" class="icon-youtube"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://www.instagram.com/templateninja/" target="_blank" class="icon-instagram"><i class="fa fa-instagram"></i></a></li>
              </ul>
            </div><!-- .col-sm-6 -->
          </div><!-- .row -->
        </div><!-- .container -->
      </section><!-- #copyright -->

    </div><!-- #page -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('assets/blog/assets/plugins/jquery.min.js') }}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('assets/blog/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/plugins/jquery.justifiedGallery.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/plugins/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/plugins/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/plugins/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/plugins/masonry.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/js/navigation.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/js/skip-link-focus-fix.js') }}"></script>
    <script src="{{ asset('assets/blog/assets/js/script.js') }}"></script>

  </body>
</html>