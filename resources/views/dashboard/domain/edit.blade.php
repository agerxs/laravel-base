    @extends('dashboard.template')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title text-center"><h4>Domaine {{$domain->name}}</h4></div>
                    <div class="panel-body table-responsive">
                       <div class="col">
                           
                           <form action={{ route('domains.update', ['domain'=>$domain->id]) }} method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">	
                                <div class="form-group">
                                <div class="col-sm-4">Acheté le  :</div>
                                    <div class='col-sm-8'>{{$domain->created_at}}</div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-4">Propriétaire : </div>
                                    <div class='col-sm-8'>{{$domain->user->name}} {{$domain->user->surname}}</div>
                                </div>
                                <div class="form-group">
                                <div class="col-sm-4">Adresse Email : </div>
                                    <div class='col-sm-8'>{{$domain->user->email}}</div>
                                </div>
                             </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label form-label">Activation</label>
                                <div class="col-sm-8">
                                    <input type="checkbox" name="status" data-toggle="toggle" data-onstyle="success"{{$domain->status ? "checked":"" }} >
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Valider</button>
                            </div>
                        </form>
                       </div>
                    </div>
                </div>
            
            </div>
        </div>
    @endsection