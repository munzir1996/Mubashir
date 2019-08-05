@extends('layouts.master')

@section('title' , ' | الاخبار')

@section('content')

<br>
<hr>
<br>

<section class="ftco-services ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <h3>الأخبار</h3>
            </div>
        </div>
        <div class="row">
            @foreach($news as $new)
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 30px;">
                    <img src="{{asset('/images/'.$new->photo)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title"><b>{{ $new->ar_title}}</b></h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ Carbon\Carbon::parse($new->created_at)->format('M , j , Y')}}</h6>
                        <p class="card-text">{!!str_limit(strip_tags($new->ar_details) , $limit =100 , $end ='...')!!}</p>
                        <a href="/ar-news/{{$new->id}}" class="btn btn-info">عرض</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
@stop
