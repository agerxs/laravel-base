@extends('dashboard.template')

@section('content')
    <div class="row">
        <!-- col-md-4 -->
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-title text-center"><h4 class="text-primary font-w-700">Demande {{\App\Http\Helpers\Constants::VALEURS[$demande->type]}}</h4></div>
                <div class="panel-body">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <div class="row">
                        <div class="col-lg-6">
                            <form action={{ route('demande.update') }} method="post" class="fieldset-form">
                                @csrf
                                <input type="hidden" name="id" value="{{$demande->id}}">
                                <fieldset>
                                    <legend>Modifier demande</legend>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class=" font-w-700">Motif de la demande :</div>
                                            <div class='font-w-700 text-uppercase'><span class="">{{\App\Http\Helpers\Constants::VALEURS[$demande->type]}}</span></div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Status de la demande :</div>
                                            <div class='font-w-700 text-uppercase'><span class="">{{\App\Http\Helpers\Constants::VALEURS[$demande->status]}}</span></div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700"><label for="status">Modifier Statut de la demande :</label></div>


                                                <select name="status" id="status" class="form-control">
                                                    <option value="" selected="selected"></option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_IS_CREATING}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_IS_CREATING]}}</option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_ACTIVE}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_ACTIVE]}}</option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_CREATED}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_CREATED]}}</option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_EXPIRED}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_EXPIRED]}}</option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_GRACE}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_GRACE]}}</option>
                                                    <option value="{{\App\Http\Helpers\Constants::STATUS_LOST}}">{{\App\Http\Helpers\Constants::VALEURS[\App\Http\Helpers\Constants::STATUS_LOST]}}
                                                    </option>
                                                </select>

                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Domaine  :</div>
                                            <div class=''>{{$demande->domain->name}}</div>
                                        </div>
                                        <div class="form-group ">
                                            <div class=" font-w-700">Créé le : </div>
                                            <div class=''>{{$demande->created_at}} </div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Mis à jour le : </div>
                                            <div class=''>{{$demande->updated_at}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Modifier</button>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                        <div class="col-lg-6">

                            <form action={{ route('domains.update', ['domain'=>$demande->id]) }} method="post" class="fieldset-form">
                                @csrf
                                @method('PUT')
                                <fieldset>
                                    <legend>Informations Domaine</legend>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <div class=" font-w-700">Domaine :</div>
                                            <div class='font-w-700 text-uppercase'><span class="">{{$demande->domain->name}}</span></div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Formule d'hébergement :</div>
                                            <div class='font-w-700 text-uppercase'><span class="">{{$demande->domain->package->name}}</span></div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Acheté le  :</div>
                                            <div class=''>{{$demande->domain->created_at}}</div>
                                        </div>
                                        <div class="form-group ">
                                            <div class=" font-w-700">Propriétaire : </div>
                                            <div class=''>{{$demande->domain->user->name}} {{$demande->domain->user->surname}}</div>
                                        </div>
                                        <div class="form-group">
                                            <div class=" font-w-700">Adresse Email : </div>
                                            <div class=''>{{$demande->domain->user->email}}</div>
                                        </div>
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
