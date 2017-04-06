@extends('layouts.app')

@section('title')
Edit Post
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title">Edit This Post</h1>
            <form method="POST" action="{{ route('posts.update', $post) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Title" name="title" value="{{ $post->title }}" required>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <textarea class="textarea" placeholder="Body" name="body" required>{{ $post->body }}</textarea>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <button class="button is-info">
                      Edit
                    </button>
                  </p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection