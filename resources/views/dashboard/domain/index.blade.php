@extends('dashboard.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title"> Domaines </div>
                
                <div class="panel-body table-responsive">
                    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                    <table id="example0" class="table display">
                        <thead>
                            <tr>
                                <th>Domaine</th>
                                <th>Status</th>
                                <th>Package</th>
                                <th>Renouvellement</th>
                                <th>Verrou</th>
                                <th>Créé le</th>
                                <th>Expire le</th>
                                
                                    <th>Actions</th>
                                    <th>Propriétaire</th>
                                
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domains as $domain)
                            <tr>
                            <td><a href='https://{{$domain->name}}' target="new">{{$domain->name}}</a></td>
                                <td>
                                    <span class='label {{$domain->status == 0 ? "label-warning":"label-success" }}'>
                                    {{($domain->status == 0) ? "En cours de création" : "Activé"}}
                                </span>
                                </td>
                                <td>
                                    {{$domain->package->name}}
                                </td>
                                <td>
                                    <span class='label {{$domain->renewable == 0 ? "label-warning":"label-success" }}'>
                                    {{($domain->renewable == 0) ? "Désactivé" : "Activé"}}
                                </span>
                                </td>
                                <td>
                                    <span class='label {{$domain->verrou == 0 ? "label-warning":"label-success" }}'>
                                    {{($domain->verrou == 0) ? "Désactivé" : "Activé"}}
                                </span>
                                </td>
                                
                                <td>{{$domain->created_at}}</td>
                                <td>{{$domain->expires_at}}</td>
                                
                                    <th><a href={{ route('domains.edit', ['domain'=>$domain->id]) }}>
                                        <span class="label label-success"><i class="fa fa-edit"></i></span>
                                    </a></th>
                            <th>{{$domain->user->email}}</th>
                                
                                
                            </tr> 
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        
        </div>
    </div>
@endsection