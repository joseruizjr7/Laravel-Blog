@extends('layout')

@section('content')
    <!-- content -->
<div id="content" class="site-content">
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

        <div class="container">
          <div class="row">
            <div class="col-md-8 page-default">

                @foreach ($posts as $post)
                    <article class="post format-standard hentry">
                        <div class="post-container">
                            <div class="post-content">
                                {{-- <img src="assets/img/danish-image-post-04.jpg" alt="I will leave you asap"> --}}
                                <div class="heading-title heading-small">
                                <span class="post-meta-cat"><a href="{{ route('category.show', $post->category) }}">{{ $post->category->name }}</a></span>
                                <h2><a href="{{ route('blog.post', ['post' => $post]) }}" rel="bookmark">{{ $post->title }}</a></h2>
                                </div><!-- .heading-small -->
                                
                                <div class="post-meta">
                                <span class="posted-on">
                                    Publicado en <a href="single.html" rel="bookmark"> <time class="entry-date" datetime="2016-05-26">{{ $post->published_at->format('M d Y') }}</time> </a>
                                </span><!-- .posted-on -->
                                {{-- <span class="byline">
                                    by <span class="author vcard"><a class="url fn n" href="archive.html">Jane</a></span>
                                </span><!-- .byline -->
                                <span class="reading-estimation">11 min read</span> --}}
                                </div><!-- .post-meta -->
                                <p>{{ $post->excerpt }}
                                <a href="{{ route('blog.post', ['post' => $post]) }}" class="more-link">
                                    <span class="moretext">Continuar leyendo</span> <span class="screen-reader-text">Do not leave your camera when traveling</span>
                                </a><!-- .more-link -->
                                </p>
                            </div><!-- .post-content -->
                        </div><!-- .post-container -->
                    </article><!-- .post -->
                @endforeach

                {{ $posts->links() }}

              {{-- <nav class="navigation posts-navigation" role="navigation">
                <h2 class="screen-reader-text">Posts navigation</h2>
                <div class="nav-links">
                  <div class="nav-previous"><a href="#">Older posts</a></div>
                  <div class="nav-next"><a href="#">Newer posts</a></div>
                </div>
              </nav><!-- .navigation --> --}}
            </div><!-- .col-md-8 -->

            <div class="col-md-4">
              {{-- <section class="widget widget_search">
                <form role="search" method="get" class="search-form" action="#">
                <label>
                  <span class="screen-reader-text">Search for:</span>
                  <input type="search" class="search-field" placeholder="Search …" value="" name="s" title="Search for:">
                </label>
                <input type="submit" class="search-submit" value="Search">
                </form><!-- search-form -->
              </section><!-- .widget_search --> --}}

              {{-- <section class="widget danish_widget_about">
                <div class="about-author-container">
                  <img src="assets/img/danish-image-about.jpg" alt="Danish Brown">
                  <div class="about-author-info">
                    <h2 class="widget-title">Danish Brown</h2>
                    <span class="author-subtitle">Young Designer</span>
                    <div class="author-description">
                      <p>Hello i’m danish. I’m 23 years old. I’m a girl who has long hair, big eyes with nice eyebrows, big…</p>
                      <a href="about.html" class="more-link"><span class="moretext">More biography</span></a>
                    </div><!-- .author-description -->
                    <div class="author-footer">
                      <div class="author-social">
                        <a href="https://www.facebook.com/Template-Ninja-1555671317979815/" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="http://twitter.com/_templateninja" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/templateninja/" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                      </div><!-- .author-social -->
                    </div><!-- .author-footer -->
                  </div><!-- .about-author-info -->
                </div><!-- .about-author-container -->
              </section><!-- .danish_widget_about --> --}}

              {{-- <section class="widget danish_widget_popular_entries">
                <h2 class="widget-title">Popular Posts</h2>
                <ul>
                  <li>
                    <div class="popular-entry-container">
                      <div class="entry-image">
                        <img src="assets/img/danish-image-post-thumbnail-01.jpg" alt="Prepare your luggage necessary">
                      </div><!-- .entry-image -->
                      <div class="entry-content">
                        <h4 class="entry-title">
                          <a href="single.html" rel="bookmark">Prepare your luggage necessary when traveling</a>
                        </h4>
                        <span class="entry-category"><a href="archive.html">Travel</a></span>
                        <span class="entry-datetime">May 8, 2016</span>
                      </div><!-- .entry-content -->
                    </div><!-- .popular-entry-container -->
                  </li>
                  <li>
                    <div class="popular-entry-container ">
                      <div class="entry-image">
                        <img src="assets/img/danish-image-post-thumbnail-02.jpg" alt="how beautiful you are">
                      </div><!-- .entry-image -->
                      <div class="entry-content">
                        <h4 class="entry-title">
                          <a href="single.html" rel="bookmark">You never know how beautiful you are</a>
                        </h4>
                        <span class="entry-category"><a href="archive.html">Love Life</a></span>
                        <span class="entry-datetime">May 8, 2016</span>
                      </div><!-- .entry-content -->
                    </div><!-- .popular-entry-container -->
                  </li>
                  <li>
                    <div class="popular-entry-container ">
                      <div class="entry-image">
                        <img src="assets/img/danish-image-post-thumbnail-03.jpg" alt="Hey, autumn is coming!">
                      </div><!-- .entry-image -->
                      <div class="entry-content">
                        <h4 class="entry-title"><a href="single.html" rel="bookmark">Hey, autumn is coming!</a></h4>
                        <span class="entry-category"><a href="archive.html">Nature</a></span>
                        <span class="entry-datetime">May 8, 2016</span>
                      </div><!-- .entry-content -->
                    </div><!-- .popular-entry-container -->
                  </li>
                </ul>
              </section><!-- .danish_widget_popular_entries -->
 --}}
              <section class="widget widget_recent_entries">    
                <h2 class="widget-title">Artículos Recientes</h2>
                <ul>
                    @foreach ($recentPosts as $post)
                        <li>
                            <a href="{{ route('blog.post', ['post' => $post]) }}">{{ $post->title }}</a>
                            <span class="post-date">{{ $post->published_at->format('M d, Y') }}</span>
                        </li>
                    @endforeach
                  
                </ul>
              </section><!-- .widget_recent_entries -->

             {{--  <section class="widget widget_archive">
                <h2 class="widget-title">Archives</h2>
                <ul>
                  <li><a href="archive.html">June 2016</a>&nbsp;(1)</li>
                  <li><a href="archive.html">April 2016</a>&nbsp;(1)</li>
                  <li><a href="archive.html">March 2016</a>&nbsp;(3)</li>
                </ul>
              </section><!-- .widget_archive --> --}}

              <section class="widget widget_categories">
                <h2 class="widget-title">Categorías</h2>
                <ul>
                    @foreach ($categories as $category)
                        <li><a href="{{ route('category.show', $category) }}">{{ $category->name }}</a> ({{ $category->posts()->count() }})</li>
                    @endforeach
                </ul>
              </section><!-- .widget_categories -->

              <section class="widget widget_tag_cloud">
                <h2 class="widget-title">Etiquetas</h2>
                <div class="tagcloud">
                    @foreach ($tags as $tag)
                        <a href="{{ route('tags.show', $tag->url) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
              </section><!-- .widget_tag_cloud -->

              <section class="widget widget_text">
                <h2 class="widget-title">Useful Links</h2>
                <div class="textwidget">
                  <ul>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Desclaimer</a></li>
                    <li><a href="#">Support</a></li>
                  </ul>
                </div><!-- .textwidget -->
              </section><!-- .widget_text -->

              {{-- <section class="widget widget_recent_comments">
                <h2 class="widget-title">Recent Comments</h2>
                <ul id="recentcomments">
                  <li>
                    <span class="comment-author-link">Jane</span> 
                    on <a href="single.html">You look so charming when wearing a glasses</a>
                  </li>
                  <li>
                    <span class="comment-author-link">Smith</span> 
                    on <a href="single.html">This road looks foggy</a>
                  </li>
                  <li>
                    <span class="comment-author-link"><a href="#">Danish</a></span> 
                    on <a href="single.html">Beauty is not just what you see</a>
                  </li>
                </ul>
              </section><!-- .widget_recent_comments --> --}}

              
            </div><!-- .col-md-4 -->
          </div><!-- .row -->
        </div><!-- .container -->

      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- #content -->
@endsection