@extends('admin.layout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @if ($post->category)
                        <div class="col">{{ $post->category->name }}</div>
                    @endif
                    <div class="col">
                        <ul class="list-inline text-right">
                            @foreach ($post->tags as $tag)
                                <li class="list-inline-item">
                                    <p class="text-muted">#{{ $tag->name }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <h1>
                    <i>{{ $post->title }}</i>
                </h1>
                <hr>
                <h2>{{ $post->excerpt }}</h2>
                <hr>
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection