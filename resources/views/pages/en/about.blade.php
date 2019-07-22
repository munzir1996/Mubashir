@extends('layouts.master2')

@section('title' , ' | about')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">About Us</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/en-home">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About us <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  @include('en-parts._numbers')

  <section class="ftco-section">
          <div class="container">
              <div class="row no-gutters">
            <div class="col-md-8 wrap-about py-5 px-4 px-md-5 ftco-animate">
              @foreach($companies as $company)
              <div class="heading-section mb-5">
                <h2 class="mb-4">{{$company->en_name}}</h2>
             </div>
           <div class="">
          {!! $company->en_profile !!}
      </div>
      @endforeach
    </div>
   </div>
  </div>
</section>
@stop
