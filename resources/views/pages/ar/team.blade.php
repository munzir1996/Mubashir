@extends('layouts.master')

@section('title' , ' | الفريق')

@section('content')

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-2">
      <div class="col-md-8 text-center heading-section ftco-animate">
        <span class="subheading">فريق العمل</span>
        <h2 class="mb-4">فريق العمل الاحترافي</h2>
      </div>
    </div>	
    <div class="row">
      @foreach($teams as $team )
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="staff">
          <div class="img-wrap d-flex align-items-stretch">
            <div class="img align-self-stretch" style="background-image: url({{'../images/'.$team->photo}});"></div>
          </div>
          <div class="text pt-3 text-center">
            <h3>{{$team->ar_name}}</h3>
            <span class="position mb-2">{{$team->ar_specialization}}</span>
            <div class="faded">
              <ul class="ftco-social text-center">
                <li class="ftco-animate"><a href="{{$team->twit}}"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="{{$team->face}}"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="{{$team->google}}"><span class="icon-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="{{$team->insta}}"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@stop