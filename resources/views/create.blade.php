@extends('layouts.app')

@section('title')
Create
@endsection

@section('content')
<section class="section">
    <div class="container">
        <div class="column is-half is-offset-one-quarter">
            <h1 class="title">Create A Post</h1>
            <form method="POST" action="{{ route('create') }}">
                {{ csrf_field() }}
                <div class="field">
                  <p class="control">
                    <input class="input" type="text" placeholder="Title" name="title" required>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <textarea class="textarea" placeholder="Body" name="body" required></textarea>
                  </p>
                </div>
                <div class="field">
                  <p class="control">
                    <button class="button is-success">
                      Create
                    </button>
                  </p>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection