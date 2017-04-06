@extends('layouts.app')

@section('title')
Profile
@endsection

@section('content')
<section class="section">
    <div class="container">
      <div class="column is-half is-offset-one-quarter">
        <article class="message is-info">
          <div class="message-body">
            <div class="columns">
              <div class="column">
                <h1 class="title"><strong>{{ $user->name }}</strong></h1>
                <small>{{ $user->email }}</small>
                <small>Member since: {{ $user->created_at->month }}/{{ $user->created_at->year }}</small>
              </div>
              <div class="column">

              </div>
              <div class="column">
                
              </div>
              <div class="column">

              </div>
            </div>
          </div>
        </article>
        @foreach ($posts as $post) 
                <article class="message">
                  <div class="message-body">
                    <h1 class="title is-4"><strong>{{ $post->title }}</strong></h1>
                    <h2 class="subtitle is-6">{{ Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</h2>
                    <p class="control">
                      {!! nl2br($post->body) !!}
                    </p>
                    <p class="control">
                      <br>
                      - {{ $post->user->name }}
                    </p>
                    @if ($post->user_id == Auth::user()->id)
                      <br><br>
                      <div class="columns">
                        <div class="column is-2">
                          <a href="{{ route('posts.edit', $post) }}" class="button is-info is-outlined">Edit</a>
                        </div>
                        <div class="column is-2">
                          <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                                <button class="button is-danger is-outlined is-link">
                                  Delete
                                </button>
                            </div>
                          </form>
                        </div>
                      </div>
                  @endif
                </article>
            @endforeach
      </div>
    </div>
</section>
@endsection