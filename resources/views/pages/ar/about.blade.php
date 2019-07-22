@extends('layouts.master')

@section('title',' | من نحن ')

@section('content')

<section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">من نحن</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="/ar-home">الرئسيه <i class="ion-ios-arrow-back"></i></a></span> <span>من نحن <i class="ion-ios-arrow-back"></i> </span></p>
        </div>
      </div>
    </div>
</section>

@include('ar-parts._numbers')

<section class="ftco-section">
          <div class="container">
              <div class="row no-gutters">
                <div class="col-md-8 offset-md-2 wrap-about py-5 px-4 px-md-5 ftco-animate">
              @foreach($companies as $company)
              <div class="heading-section mb-5">
                <h2 class="mb-4">{{$company->ar_name}}</h2>
             </div>
        <div class="">
          {!! $company->ar_profile !!}
      </div>
      @endforeach
    </div>
   </div>
  </div>
</section>

@endsection