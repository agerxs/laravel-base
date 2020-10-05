@extends('dashboard.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title"> Demandes
                    @if ($type!='me')
                    {{\App\Http\Helpers\Constants::VALEURS[$type]}} @endif</div>

                <div class="panel-body table-responsive">
                    <a class="btn btn-primary mb-3 text-white" href="{{route('demande.new')}}">Initer une demande</a>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    <table id="example0" class="table display table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Domain</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Créé par</th>
                            <th>Créé le</th>
                            <th>Modifié le</th>
                            <th>Traiter</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($demandes as $demande)
                            <tr>
                                <td>{{$demande->id}}</td>
                                <td>
                                   {{$demande->domain->name }}

                                </td>
                                <td>
                                    {{\App\Http\Helpers\Constants::VALEURS["$demande->status"]}}
                                </td>
                                <td> {{\App\Http\Helpers\Constants::VALEURS["$demande->type"]}}</td>
                                <td>{{$demande->created_by}}</td>
                                <td>{{$demande->created_at}}</td>
                                <td>{{$demande->updated_at}}</td>
                                @if(Auth::user()->role_id==2)
                                <th><a href={{ route('demande.edit', ['id'=>$demande->id]) }}>
                                        <span class="label label-success"><i class="fa fa-edit"></i>Traiter</span>
                                    </a></th>
                                    @endif

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
