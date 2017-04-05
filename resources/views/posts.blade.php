@extends('layouts.app')

@section('title')
Posts
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="column is-half is-offset-one-quarter">
              @foreach ($posts as $post) 
                <article class="message">
                  <div class="message-body">
                    <h1 class="title is-4"><strong>{{ $post->title }}</strong></h1>
                    <h2 class="subtitle is-6">{{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</h2>
                    <p class="control">
                      {!! nl2br($post->body) !!}
                    </p>
                    <p class="control">
                      - {{ $post->user->name }}
                    </p>
                  </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection