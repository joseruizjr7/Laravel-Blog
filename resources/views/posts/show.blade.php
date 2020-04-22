@extends('layout')

@section('meta-title')
    {{ $post->title }}
@endsection
@section('meta-description')
    {{ $post->excerpt }}
@endsection

@section('content')
  <!-- content -->
  <div id="content" class="site-content">
    <div id="primary" class="content-area">
      <main id="main" class="site-main" role="main">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <article class="post format-standard hentry">
                <header class="entry-header">
                  <div class="heading-title">
                    <h1 class="entry-title">{{ $post->title }}</h1>
                  </div>
                  <div class="entry-meta">
                    <span class="posted-on">Publicado en {{ $post->published_at->format('M d, Y') }}</span>
                  </div><!-- .entry-meta -->
                </header><!-- .entry-header -->

                <div class="entry-content">
                  {!! $post->body !!}
                </div><!-- .entry-content -->

                <footer class="entry-footer">
                  <span class="cat-links">Publicado en <a href="{{ route('category.show', $post->category) }}">{{ $post->category->name }}</a></span><span class="tags-links">Tagged @foreach ($post->tags as $tag) <a href="{{ route('tags.show', $tag->url) }}">{{ $tag->name }}, </a> @endforeach</span>
                </footer><!-- .entry-footer -->
              </article><!-- .post -->

              {{-- <nav class="navigation post-navigation" role="navigation">
                <h2 class="screen-reader-text">Post navigation</h2>
                <div class="nav-links">
                  <div class="nav-previous"><a href="#" rel="prev">Fireworks which ignited are quickly exhausted. You know what?</a></div><div class="nav-next"><a href="#" rel="next">You say: Dont leave me, but you are gone. Liar</a></div>
                </div>
              </nav><!-- .navigation --> --}}

              <div class="related-posts">
                <h3>También te podría gustar</h3>
                <div class="row">

                  @foreach ($suggestedPosts as $sugPost)
                      <div class="col-md-3 col-sm-6">
                        <div class="post-container">
                          {{-- <div class="post-thumbnail">
                            <a href="single.html"><img src="assets/img/danish-image-post-01.jpg" alt="Conquered the rock with rock!"></a>
                          </div><!-- .post-thumbnail --> --}}
                          <span class="post-meta"><a href="{{ route('blog.post', ['post' => $sugPost]) }}">{{ $sugPost->published_at->format('M d, Y') }}</a></span>
                          <h2 class="post-title"><a href="{{ route('blog.post', ['post' => $sugPost]) }}">{{ $sugPost->title }}</a></h2>
                          <p>{{ Str::limit($sugPost->excerpt, 30) }}</p>
                        </div><!-- .post-container -->
                      </div><!-- .col-md-3 -->
                  @endforeach

                </div><!-- .row -->
              </div><!-- .related-posts -->

              <div class="comments">
                <div class="divider"></div>
                  <div id="disqus_thread"></div>
          <script>
          
          /**
          *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
          *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
          /*
          var disqus_config = function () {
          this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
          this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
          };
          */
          (function() { // DON'T EDIT BELOW THIS LINE
          var d = document, s = d.createElement('script');
          s.src = 'https://zendero.disqus.com/embed.js';
          s.setAttribute('data-timestamp', +new Date());
          (d.head || d.body).appendChild(s);
          })();
          </script>
          <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                                          
                </div><!-- .comments -->
              {{-- <div id="comments" class="comments-area">
                <div id="respond" class="comment-respond">
                  <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond">Cancel reply</a></small></h3>
                  <form action="#" method="post" id="commentform" class="form-horizontal comment-form" novalidate="">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea id="comment" class="form-control" rows="6" name="comment" aria-required="true" placeholder=" Your Message : "></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-4">
                        <input type="text" name="author" value="" class="form-control" placeholder="*Name :" aria-required="true">
                      </div>
                      <div class="col-sm-4">
                        <input type="email" name="email" value="" class="form-control" placeholder="*Email :" aria-required="true">
                      </div>
                      <div class="col-sm-4">
                        <input type="url" name="url" value="" class="form-control" placeholder="Website :">
                      </div>
                    </div>
                    <p class="form-submit">
                      <input name="submit" type="submit" id="submit" class="btn btn-danish btn-lg btn-block" value="Submit">
                      <input type="hidden" name="comment_post_ID" value="82" id="comment_post_ID">
                      <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                    </p>
                  </form><!-- #commentform -->
                </div><!-- #respond -->
              </div><!-- #comments --> --}}

            </div><!-- .col-md-8 -->
          </div><!-- .row -->
        </div><!-- .container -->

      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- #content -->
@endsection