<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <title>Foxlabel | Login Page</title>
    <!-- Css Files -->
    <link href="/dashboard/css/root.css" rel="stylesheet">
    <style type="text/css">
        body {
            background: #F5F5F5;
        }
    </style>
</head>
<body>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name"> <img src="images/logo_png.png" alt="AfricaWeb"></h1>
                <h3>Administration</h3>
            </div> 
            <p>Connexion</p>
            <form method="POST" class="m-t" action="{{ route('login') }}">
              @csrf
                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                <div class="form-group">
                    <input type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" type="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                  </div>
                <button type="submit" class="btn btn-primary block full-width m-b mb-2">Login</button>
                
                @if (Route::has('password.request'))
                <small><a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a></small>
            @endif
            </form>
            <p class="m-t"> <small>AfricaWeb &copy; 2020</small> </p>
        </div>
    </div>
</body>
</html>