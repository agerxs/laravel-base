@extends('layouts.app')

@section('content')
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="images/bg/bg1.jpg">
    <div class="container pt-60 pb-60">
      <!-- Section Content -->
      <div class="section-content">
        <div class="row">
          <div class="col-md-12 text-center">
            <h3 class="font-28 text-white">Inscription</h3>
            <ol class="breadcrumb text-center text-black mt-10">
              <li><a href="/">Accueil</a></li>
              <li class="active text-theme-colored">Inscription</li>
            </ol>
          </div>
        </div>
      </div>
    </div>      
  </section>
<section>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                @include('partials.register_form')
    </div>
        </div>
    </div>  
</div>               
</section>                 
 
@endsection
