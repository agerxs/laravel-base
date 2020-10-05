@extends('dashboard.template')

@section('content')
    <div class="row">
        <!-- col-md-4 -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-title text-center"><h4 class="text-primary font-w-700">Nouvelle Demande</h4></div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <form action={{ route('demande.create') }} method="post" class="fieldset-form">
                                @csrf
                                <fieldset>
                                    <legend>Créer demande</legend>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class=" font-w-700">Motif de la demande :</div>
                                            <select name="type" id="type" class="form-control">
                                                <option value="" selected="selected"></option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_CREATION_DOMAINE}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_CREATION_DOMAINE]}}</option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_TRANSFERT_DOMAINE}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_TRANSFERT_DOMAINE]}}</option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_RENOUVELLEMENT}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_RENOUVELLEMENT]}}</option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_VERROUILLAGE_DOMAINE}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_VERROUILLAGE_DOMAINE]}}</option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_MODIFICATION_DNS}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_MODIFICATION_DNS]}}</option>
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_CREATION_CERTIFICAT_SSL}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_CREATION_CERTIFICAT_SSL]}}
                                                <option value="{{\App\Http\Helpers\Constants::DEMANDE_CREATION_HEBERGEMENT}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::DEMANDE_CREATION_HEBERGEMENT]}}
                                               </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Domaine concerné :</div>
                                            <select name="domaine" id="domaine" class="form-control">
                                                <option value="" selected="selected"></option>
                                                @foreach($domains as $domaine)
                                                    <option value="{{$domaine->id}}">{{$domaine->name}}</option>
                                                    @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Créer</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
        <!-- Fin col-md-4 -->


    </div>
@endsection
