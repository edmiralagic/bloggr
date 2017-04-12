@extends('layouts.app')

@section('title')
Post
@endsection

@section('content')
<section class="section">
  <div class="container">
    <div class="column is-half is-offset-one-quarter">
      <article class="message">
        <div class="message-body">
          <h1 class="title is-4"><strong>{{ $post->title }}</strong></h1>
          <h2 class="subtitle is-6">{{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</h2>
          <p class="control">
            {!! nl2br($post->body) !!}
          </p>
          <p class="control">
            <br>
            - <a href="{{ route('profile.show', $post->user->name) }}">{{ $post->user->name }}</a>
          </p>
          <br>
          @foreach ($comments as $comment)
          @if ($comment->post_id == $post->id)
          <div class="box">
            <article class="media">
              <div class="media-content">
                <div class="content">
                  <p>
                    <strong>{{ App\User::find($comment->user_id)->name }}</strong>
                    <small>{{ Carbon\Carbon::parse($comment->updated_at)->diffForHumans() }}</small>
                    <br>
                    {!! nl2br($comment->message) !!}
                  </p>
                </div>
                <nav class="level is-mobile">
                  <div class="level-left">
                    @if($comment->user_id == Auth::user()->id)
                    <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <button class="button is-small is-danger">
                      Delete
                      </button>
                    </form>
                    @endif
                  </div>
                </nav>
              </div>
            </article>
          </div>
          @endif
          @endforeach
          <form action="{{ route('comments.store', $post) }}" method="POST">
            {{ csrf_field() }}
            <div class="field">
              <p class="control">
                <textarea class="textarea" placeholder="Comment" name="message" required></textarea>
              </p>
            </div>
            <div class="field">
              <button class="button is-small is-primary">
              Submit
              </button>
            </div>
          </form>
          @if ($post->user_id == Auth::user()->id)
          <br>
          <div class="columns">
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column"></div>
            <div class="column">
              <a href="{{ route('posts.edit', $post) }}" class="is-not-linked button is-small is-info">Edit</a>
            </div>
            <div class="column">
              <form action="{{ route('posts.destroy', $post) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="button is-small is-danger">
                Delete
                </button>
              </div>
            </form>
          </div>
        </div>
        @endif
      </article>
    </div>
  </div>
</section>
@endsection
