@extends('layouts.master2')

@section('title' , ' | News')

@section('content')

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0"
                style="background-image: url({{'/images/'.$new->photo}});">
            </div>
            <div class="col-md-7 wrap-about py-5 px-4 px-md-5 ftco-animate">
                <div class="heading-section mb-5">
                    <h2 class="mb-4">{{$new->en_title}}</h2>
                </div>
                <div class="">
                    {!! $new->en_details !!}
                </div>
            </div>
        </div>
    </div>
</section>

<br>
<hr>
<br>

<section class="ftco-services ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">More News</span>
            </div>
        </div>
        <div class="row">
            @foreach($all as $one)
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px;">
                    <img src="{{asset('/images/'.$one->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $one->en_title}}</b></h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ Carbon\Carbon::parse($new->created_at)->format('M , j , Y')}}</h6>
                        <p class="card-text">{{str_limit(strip_tags($one->en_details) , $limit =100 , $end ='...')}}</p>
                        <a href="/ar-news/{{$one->id}}" class="btn btn-info">Show</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@stop
