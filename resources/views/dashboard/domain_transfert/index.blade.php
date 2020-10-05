@extends('dashboard.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title"> Utilisateurs </div>
                
                <div class="panel-body table-responsive">
                    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                    <table id="example0" class="table display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Domain</th>

                                <th>Créé le</th>
                                <th>Actions</th>
                                                          
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transferts as $transfert)
                            <tr>
                                <td>#</td>
                            <td>{{$transfert->code}}</td>
                            <td>{{$transfert->status}}</td>
                            <td>{{$transfert->domain->name}}</td>
                            
                        <td>{{$transfert->created_at}}</td>
                        <td>
                            
                            <a href={{ route('domains_transferts.edit', ['domains_transfert'=>$transfert]) }}><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
                            <a href="#"><span class="label label-danger"><i class="fa fa-trash"></i></span></a>
                        </td>
                            </tr> 
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        
        </div>
    </div>
@endsection