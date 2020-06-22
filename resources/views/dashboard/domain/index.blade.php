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
                                <th>Créé le</th>
                                <th>Expire le</th>
                                @if ($is_admin)
                                    <th>Actions</th>
                                    <th>Propriétaire</th>
                                @endif
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($domains as $domain)
                            <tr>
                            <td><a href='https://{{$domain->name}}' target="new">{{$domain->name}}</a></td>
                                <td>
                                    <span class='label {{$domain->status == 0 ? "label-warning":"label-success" }}'>
                                    {{($domain->status == 0) ? "Désactivé" : "Activé"}}
                                </span>
                                </td>
                                <td>{{$domain->created_at}}</td>
                                <td>{{$domain->expires_at}}</td>
                                @if ($is_admin)
                                    <th><a href={{ route('domains.edit', ['domain'=>$domain->id]) }}>
                                        <span class="label label-success"><i class="fa fa-edit"></i></span>
                                    </a></th>
                            <th>{{$domain->user->email}}</th>
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