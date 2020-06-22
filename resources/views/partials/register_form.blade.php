<div class="row">
    <div class="col-md-6 col-md-push-3">
      <form name="reg-form" class="register-form" method="post" action="{{ route('register') }}">
        @csrf
        <div class="icon-box mb-0 p-0">
          <a href="#" class="icon icon-bordered icon-rounded icon-sm pull-left mb-0 mr-10">
            <i class="pe-7s-users"></i>
          </a>
          <h4 class="text-gray pt-10 mt-0 mb-30">Vous n'avez pas de compte. Inscrivez-vous maintenant.</h4>
        </div>
        <hr>
        <p class="text-gray">Formulaire d'inscription.</p>
        <div class="row">
          <div class="form-group col-md-6">
            <label>{{ __('Nom') }}</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        </div>
        <div class="form-group col-md-6">
          <label>{{ __('Prénoms') }}</label>
          <input name="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>
          @error('surname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
      </div>
          <div class="form-group col-md-12">
            <label>{{ __('Addresse E-Mail') }}</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        </div>
          <div class="form-group col-md-6">
            <label>{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        </div>
        <fieldset>
            <legend>Informations utilisateur</legend>
            <div class="row">
                
                    <div class="form-group col-md-6">
                        <label>{{ __('Téléphone') }}</label>
                        <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>
                
                <div class="form-group col-md-6">
                    <label>{{ __('Pays :') }}</label>
                    <select name="country"  class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country" autofocus>
                      <option value="Côte d'Ivoire" selected>Côte d'Ivoire</option>
                      @foreach ($countries as $country)
                    <option value={{$country->name->common}}>{{$country->name->common}}</option>
                      @endforeach
                    </select>
                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                </div>
                <div class="form-group col-md-6">
                  <label>{{ __('Ville :') }}</label>
                  <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                  @error('city')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
              </div>
              <div class="form-group col-md-6">
                <label>{{ __('Quartier :') }}</label>
                <input name="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value="{{ old('town') }}" required autocomplete="town" autofocus>
                @error('town')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            </div>
            <div class="form-group col-md-6">
              <label>{{ __('Profession :') }}</label>
              <input name="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value="{{ old('profession') }}" required autocomplete="profession" autofocus>
              @error('profession')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
          </div>
          <div class="form-group col-md-6">
            <label>{{ __('Type de compte :') }}</label>
            <select name="account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" value="{{ old('account_type') }}" required autocomplete="account_type" autofocus>
              <option value="perso">Personnel</option>
              <option value="entreprise">Entreprise</option>
            </select>
             @error('account_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        </div>
        <div class="form-group col-md-12">
          <label>{{ __('Vous créez ce compte pour :') }}</label>
          <select name="account_owner" class="form-control @error('account_owner') is-invalid @enderror" name="account_owner" value="{{ old('account_owner') }}" required autocomplete="account_owner" autofocus>
            <option value="own">Vous même</option>
            <option value="client">Un client</option>
          </select>
          @error('account_owner')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
        </div>
        <div class="form-check col-md-12">
          <input name="want_offer" type="checkbox" class="form-check-input @error('want_offer') is-invalid @enderror" value="0">
          <label class="form-check-input" for="want_offer">{{ __('Souhaitez vous recevoir des offres Africaweb ?') }}</label>
          @error('want_offer')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
        </div>


            </div>
        </fieldset>


        <div class="form-group">
          <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">{{ __('Inscription') }}</button>
        </div>
      </form>
    </div>
  </div>

                    
