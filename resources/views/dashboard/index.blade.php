    @extends('dashboard.template')

    @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title"> Tableau de bord </div>
                    
                    <div class="panel-body">
                        @if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <div class="mini-stat clearfix bg-primary rounded"> 
                                    <div class="mini-stat-info"> <span class="counter" data-counter="counterup" data-value={{$nbdomains}}>{{$nbdomains}}</span> domaine(s) hébergé(s) </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4  col-xs-12">
                                <div class="mini-stat clearfix bg-warning rounded"> 
                                    <div class="mini-stat-info"> <span class="counter" data-counter="counterup" data-value={{$nbdomains_wait}}>{{$nbdomains_wait}}</span> Domaines en attente </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4  col-xs-12">
                                <div class="mini-stat clearfix bg-success rounded">
                                <div class="mini-stat-info"> <span class="counter" data-counter="counterup" data-value={{$payments_sum}}>{{$payments_sum}} FCFA</span> FCFA (Total transactions)</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    @endsection