    @extends('dashboard.template')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                <div class="panel-title text-center"><h4>{{$user->name}} {{$user->surname}}</h4></div>
                    <div class="panel-body table-responsive">
                        <div class="row">
                            <form class="col-sm-12" action={{ route('users.update', ['user'=>$user->id]) }} method="post">
                                @csrf
                                {{ method_field('PATCH') }}
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label>{{ __('Nom') }}</label>
                                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label>{{ __('Prénoms') }}</label>
                                  <input name="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$user->surname}}" required autocomplete="surname" autofocus>
                                  @error('surname')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                              </div>
                                  <div class="form-group col-md-6">
                                    <label>{{ __('Addresse E-Mail') }}</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value={{$user->email}} required autocomplete="email">
                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                </div>
                                
                            
                                            <div class="form-group col-md-6">
                                                <label>{{ __('Téléphone') }}</label>
                                                <input name="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value={{$user->phone}} required autocomplete="phone" autofocus>
                                                @error('phone')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                            </div>
                                        
                                        <div class="form-group col-md-6">
                                          <label>{{ __('Ville :') }}</label>
                                          <input name="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value={{$user->city}} required autocomplete="city" autofocus>
                                          @error('city')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                          @enderror
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label>{{ __('Quartier :') }}</label>
                                        <input name="town" type="text" class="form-control @error('town') is-invalid @enderror" name="town" value={{$user->town}} required autocomplete="town" autofocus>
                                        @error('town')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>{{ __('Profession :') }}</label>
                                      <input name="profession" type="text" class="form-control @error('profession') is-invalid @enderror" name="profession" value={{$user->profession}} required autocomplete="profession" autofocus>
                                      @error('profession')
                                                          <span class="invalid-feedback" role="alert">
                                                              <strong>{{ $message }}</strong>
                                                          </span>
                                                      @enderror
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label>{{ __('Type de compte :') }}</label>
                                    <select name="account_type" class="form-control @error('account_type') is-invalid @enderror" name="account_type" value={{$user->account_type}} required autocomplete="account_type" autofocus>
                                      <option value="perso">Personnel</option>
                                      <option value="entreprise">Entreprise</option>
                                    </select>
                                     @error('account_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                  <label>{{ __('Vous créez ce compte pour :') }}</label>
                                  <select name="account_owner" class="form-control @error('account_owner') is-invalid @enderror" name="account_owner" value={{$user->account_owner}} required autocomplete="account_owner" autofocus>
                                    <option value="own">Vous même</option>
                                    <option value="client">Un client</option>
                                  </select>
                                  @error('account_owner')
                                                      <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span>
                                                  @enderror
                                </div>
                                <div class="form-group col-sm-6">
                                    
                                    <label class="">Administrateur</label>
                                    <select name="role_id" class="form-control">
                                        <option value="1" {{$user->role_id==1 ? "selected":"" }}>Role Utilisateur</option>
                                        <option value="2" {{$user->role_id==2 ? "selected":"" }} >Role Administrateur</option>
                                    </select>
                                         </div>
                                </div>
                                </div>
                                    </div>
                                    <button type="submit" class="btn btn-default">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    @endsection