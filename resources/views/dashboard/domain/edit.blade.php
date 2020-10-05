    @extends('dashboard.template')

    @section('content')
        <div class="row">
            <!-- col-md-4 -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-title text-center"><h4 class="text-primary font-w-700">Domaine {{$domain->name}}</h4></div>
                    <div class="panel-body">
                        @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                        @endif
                        <div class="row">
                       <div class="col-lg-4">
                           
                           <form action={{ route('domains.update', ['domain'=>$domain->id]) }} method="post" class="fieldset-form">
                            @csrf
                            @method('PUT')
                            <fieldset>
                                <legend>Informations Domaine</legend>     
                            <div class="form-group">	
                                <div class="form-group">
                                    <div class=" font-w-700">Formule d'hébergement :</div>
                                        <div class='font-w-700 text-uppercase'><span class="">{{$domain->package->name}}</span></div>
                                    </div>
                                <div class="form-group">
                                <div class=" font-w-700">Acheté le  :</div>
                                    <div class=''>{{$domain->created_at}}</div>
                                </div>
                                <div class="form-group ">
                                <div class=" font-w-700">Propriétaire : </div>
                                    <div class=''>{{$domain->user->name}} {{$domain->user->surname}}</div>
                                </div>
                                <div class="form-group">
                                <div class=" font-w-700">Adresse Email : </div>
                                    <div class=''>{{$domain->user->email}}</div>
                                </div>
                             </div>
                             @if($is_admin)
                             
                            <div class="pl-0 checkbox checkbox-danger">
                                <input type="checkbox" id="status" name="status"  checked={{$domain->status ? "checked":"" }} >
                                <label for="status" class=" control-label form-label font-w-700">Activation</label>     
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Valider</button>
                            </div>
                            @else 
                            <div class="form-group row">
                                <div class="col-sm-5 font-w-700">Status :</div>
                                    <div class='col-sm-7'>{!! ($domain->status==1) ? 
                                    "<span class='label label-success'>Activé </span>" :
                                    "<span class='label label-danger'>Désactivé </span>"
                                    !!}</div>
                                </div>
                            @endif
                            <hr>
                            <div class="form-group row">
                                    <div class="col-sm-4 font-w-700">
                                        <label for=""><i class="fa fa-dashboard pl-3" aria-hidden="true"></i> CPANEL </label>
                                    </div>
                                    <div class='col-sm-8'>
                                    <a class='' href="https://{{$domain->name}}/cpanel"><i class="fa fa-external-link pl-3" aria-hidden="true"></i> https://{{$domain->name}}/cpanel</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 font-w-700">
                                        <label for=""><i class="fa fa-inbox pl-3" aria-hidden="true"></i> WEBMAIL </label>
                                    </div>
                                    <div class='col-sm-7'>
                                    <a class='' href="https://{{$domain->name}}/webmail"><i class="fa fa-external-link pl-3" aria-hidden="true"></i> https://{{$domain->name}}/webmail</a>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                       </div>
                       
                       <div class="col-lg-4">
                        <form class="fieldset-form" action={{ route('domains.update', ['domain'=>$domain->id]) }} method="post">
                         @csrf
                         @method('PUT')
                         <fieldset>
                             <legend>Modifier les DNS</legend>
                         <div class="form-group">
                             <label class=" control-label text-center font-w-700">DNS 1 :</label>
                             <div class=""> 
                             <input type="text" class="form-control" name="dns1" value="{{$domain->dns1}}" >
                            </div>
                         </div>
                         <div class="form-group">
                             <label class=" control-label text-center font-w-700">DNS 2 :</label>
                             <div class="">
                             <input type="text" class="form-control" name="dns2" value="{{$domain->dns2}}" >
                             </div>
                         </div>
                         <div class="form-group">
                             <label class=" control-label text-center font-w-700">DNS 3 :</label>
                             <div class="">
                             <input type="text" class="form-control" name="dns3" value="{{$domain->dns3}}" >
                             </div>
                         </div>
                         <div class="form-group">
                             <label class=" control-label text-center font-w-700">DNS 4 :</label>
                             <div class="">
                             <input type="text" class="form-control" name="dns4" value="{{$domain->dns4}}" >
                             </div>
                         </div>
                         <div class="form-group">
                             
                             <div class="col-sm-4 col-offset-4">
                             <button class="btn btn-primary" type="submit">Valider</button>
                         </div>
                         </div>
                     </fieldset>
                     </form>
                    </div>
                    <div class="col-lg-4">
                        <form class="fieldset-form" id="transfert" action={{ route('domain.updatestate') }} method="post">
                            @csrf
                            
                            <fieldset>
                                <legend>Code de transfert</legend>  
                                         
                            <div class="form-group row">
                                
                                @if (empty($transfert))
                                <input type="hidden" name="ask_code">
                                <input type="hidden" name="domain_id" value="{{$domain->id}}">
                                <div class="col-sm-12">
                                    <a class="btn btn-secondary" class="modalicon" data-toggle="modal" data-target="#myModal" id="ask_code" ><i class="fa fa-exchange"></i>Demander un code</a>
                                    <script>
                                    document.querySelector('#ask_code').onclick = function () {
                                                            swal({
                                                                title: "Etes vous sur?",
                                                                text: "Vous allez demander un code de transfert!",
                                                                type: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#DD6B55",
                                                                confirmButtonText: "Oui, Confirmer!",
                                                                closeOnConfirm: false
                                                            },
                                                            function () {
                                                                jQuery( "#transfert" ).submit();
                                                                //swal("Confirmé!", "Votre demande a été prise en compte.", "success");
                                                            });
                                                        };
                                    </script>
                                </div>
                                @else 
                                <div class="col-sm-12">
                                <button class="btn btn-primary" disabled class="modalicon" data-toggle="modal" data-target="#myModal" id="ask_code" >
                                    <i class="fa fa-exchange"></i>Demande initiée.
                                </button>
                                </div>
                                @endif
                            </div>
                        </fieldset>
                        </form>

                        <form id="verrou" class="fieldset-form" action={{ route('domain.updatestate') }} method="post">
                            @csrf
                            
                            <fieldset>
                                <legend>Verrouiller domaine</legend>           
                            <div class="form-group row">
                                @if($domain->verrou==0)
                                <input type="hidden" name="lock_domain" value="1">
                                @else 
                                <input type="hidden" name="lock_domain" value="0">
                                @endif
                                <input type="hidden" name="domain_id" value="{{$domain->id}}">
                                <div class="col-sm-12">
                                <a class="btn btn-{{ $domain->verrou ? "warning text-white":"secondary"}}" class="modalicon" data-toggle="modal" data-target="#myModal" id="lock_domain" ><i class="fa fa-lock"></i>
                                    {{$domain->verrou ? "Deverrouiller le domaine" : "Verrouiller le domaine"}}
                                    
                                </a>
                                    <script>
                                        document.querySelector('#lock_domain').onclick = function (id) {
                                                                swal({
                                                                    title: "Etes vous sur?",
                                                                    text: "Vous allez modifier le domaine!",
                                                                    type: "warning",
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: "#DD6B55",
                                                                    confirmButtonText: "Oui, Confirmer!",
                                                                    closeOnConfirm: false
                                                                },
                                                                function () {
                                                                    jQuery( "#verrou" ).submit();
                                                                    //swal("Confirmé!", "Votre demande a été prise en compte.", "success");
                                                                });
                                                            };
                                        </script></div>
                            </div>  
                        </fieldset>
                        </form>
                        <form id="renew" class="fieldset-form" action={{ route('domain.updatestate') }} method="post">
                            @csrf
                            
                            <fieldset>
                                <legend>Renouvellement automatique</legend>           
                            <div class="form-group row">
                                @if($domain->renewable==0)
                                <input type="hidden" name="renew" value="1">
                                @else 
                                <input type="hidden" name="renew" value="0">
                                @endif
                            <input type="hidden" name="domain_id" value="{{$domain->id}}">
                                <div class="col-sm-12">
                                    <a class="btn btn-{{ $domain->renewable ? "warning text-white":"secondary"}}" class="modalicon" data-toggle="modal" data-target="#myModal" id="renew" ><i class="fa fa-exchange"></i>
                                        {{$domain->verrou ? "Desactiver renouvellement" : "Renouvellement auto"}}
                                        </a>
                                    <script>
                                        document.querySelector('#renew').onclick = function () {
                                                                swal({
                                                                    title: "Etes vous sur?",
                                                                    text: "Modifier le renouvellement automatique!",
                                                                    type: "info",
                                                                    showCancelButton: true,
                                                                    confirmButtonColor: "#DD6B55",
                                                                    confirmButtonText: "Oui, Confirmer!",
                                                                    closeOnConfirm: false
                                                                },
                                                                function () {
                                                                    jQuery( "#renew" ).submit();
                                                                    //swal("Confirmé!", "Votre demande a été prise en compte.", "success");
                                                                });
                                                            };
                                        </script></div>
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