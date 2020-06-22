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
                                <th>Nom</th>
                                <th>Téléphone</th>
                                <th>Pays</th>
                                <th>Type de compte</th>
                                <th>Profession</th>
                                <th>Email</th>
                                <th>Admin</th>
                                <th>Créé le</th>
                                <th>Actions</th>
                                                          
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>#</td>
                            <td>{{$user->name}} {{$user->surname}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->country}}</td>
                                <td>{{$user->account_type}}</td>
                            <td>{{$user->profession}}</td>
                            <td>{{$user->email}}</td>
                            <td><span class="label label-{{ $user->role->id==2 ? "success" : "primary"}} ">
                                {{ $user->role->id==2 ? "Oui" : "Non"}}
                            </span></td>
                        <td>{{$user->created_at}}</td>
                        <td>
                            <a href="#"><span class="label label-primary"><i class="fa fa-eye"></i></span></a>
                            <a href={{ route('users.edit', ['user'=>$user]) }}><span class="label label-warning"><i class="fa fa-edit"></i></span></a>
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