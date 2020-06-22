@extends('layouts.app')

@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg1.jpg">
    <div class="container pt-60 pb-60">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="font-28 text-white">Connexion</h3>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="/">Accueil</a></li>
              <li class="active text-theme-colored">Connexion</li>
            </ol>
          </div>
        </div>
      </div>
    </div>      
  </section>
<section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-push-3">
          <h4 class="text-gray mt-0 pt-5"> {{ __('Connexion') }}</h4>
          <hr>
          <p>Formulaire de connexion.</p>
          <form method="POST" class="clearfix" action="{{ route('login') }}">
            @csrf
            <div class="row">
              <div class="form-group col-md-12">
                <label for="email">{{ __('Addresse E-Mail') }}</label>
                <input id="email" name="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" name="password" class="form-control @error('password') is-invalid @enderror" type="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
            </div>
            <div class="checkbox pull-left mt-15">

                

              <label for="remember">
                <input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                {{ __('Se souvenir de moi') }} </label>
            </div>
            <div class="form-group pull-right mt-10">
              <button type="submit" class="btn btn-dark btn-sm">{{ __('Connexion') }}</button>
            </div>
            <div class="clear text-center pt-10">
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif
            </div>
            {{-- <div class="clear text-center pt-10">
              <a class="btn btn-dark btn-lg btn-block no-border mt-15 mb-15" href="#" data-bg-color="#3b5998">Login with facebook</a>
              <a class="btn btn-dark btn-lg btn-block no-border" href="#" data-bg-color="#00acee">Login with twitter</a>
            </div> --}}
          </form>
          <p>Vous n'avez pas de compte ? <a class="btn btn-link" href={{ route('register') }}>Inscription</a></p>
        </div>
      </div>
    </div>
  </section>
                        
                        
 
@endsection
