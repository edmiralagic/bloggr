@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')
<section class="section is-medium">
    <div class="container">
        <div class="column is-half is-offset-one-quarter">
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                
                <div class="field">
                  <p class="control has-icon">
                    <input class="input" type="text" placeholder="Username" name="name" required>
                    <span class="icon is-small">
                      <i class="fa fa-user"></i>
                    </span>
                  </p>
                </div>

                <div class="field">
                  <p class="control has-icon">
                    <input class="input" type="email" placeholder="Email" name="email" required>
                    <span class="icon is-small">
                      <i class="fa fa-envelope"></i>
                    </span>
                  </p>
                </div>

                <div class="field">
                  <p class="control has-icon">
                    <input class="input" type="password" placeholder="Password" name="password" required>
                    <span class="icon is-small">
                      <i class="fa fa-lock"></i>
                    </span>
                  </p>
                </div>

                <div class="field">
                  <p class="control has-icon">
                    <input class="input" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                    <span class="icon is-small">
                      <i class="fa fa-lock"></i>
                    </span>
                  </p>
                </div>

                <div class="field">
                  <p class="control">
                    <button class="button is-success">
                      Register
                    </button>
                  </p>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
