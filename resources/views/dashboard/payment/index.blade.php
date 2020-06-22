@extends('dashboard.template')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-title"> Paiements </div>
                
                <div class="panel-body table-responsive">
                    @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                    <table id="example0" class="table display">
                        <thead>
                            <tr>
                                <th>Id Paiement</th>
                                <th>Domaine</th>
                                <th>Status</th>
                                <th>Montant</th>
                                <th>Email Client</th>
                                <th>Créé le</th>
                                <th>Imprimer</th>
                                                          
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                            <td>{{$payment->transaction_id}}</td>
                            <td><a href='https://{{$payment->domain}}' target="new">{{$payment->domain}}</a></td>
                                <td>
                                    <span class='label {{$payment->status == 0 ? "label-warning":"label-success" }}'>
                                    {{($payment->status == 0) ? "Non payée" : "Payé"}}
                                </span>
                                </td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->user->email}}</td>
                                <td>{{$payment->created_at}}</td>
                                <td><span><i class="fa fa-print"></i></span></td>
                                
                            </tr> 
                            @endforeach
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        
        </div>
    </div>
@endsection