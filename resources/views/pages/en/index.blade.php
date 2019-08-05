@extends('layouts.master2')

@section('title' , ' | Home')

@section('content')

<section class="home-slider owl-carousel" style="direction:ltr">
    <div class="slider-item" style="background-image:url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_4.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_6.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_7.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_8.jpg);" data-stellar-background-ratio="0.5">
    </div>
    <div class="slider-item" style="background-image:url(images/bg_9.jpg);" data-stellar-background-ratio="0.5">
    </div>
</section>
<br><br>
{{-- Products --}}
<section class="ftco-services ftco-no-pt" style="padding: 0px 0 0em 0;">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Products</span>
                <h2 class="mb-4">Our products</h2>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch" style="height:100px">
                        <div class="img align-self-stretch"
                            style="background-image: url({{'../images/'.$product->photo}});"></div>
                    </div>
                    <div class="text pt-3 text-center">
                        <a href="product/desc/{{$product->id}}">
                            <h3 style="color:#2F3195;">{{ $product->en_name}}</h3>
                        </a>
                        <span style="color:black;"
                            class="position mb-2">{!!str_limit(strip_tags($product->en_description) , $limit =20 , $end ='...')!!}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>
{{-- Teams --}}
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Team</span>
                <h2 class="mb-4">Our Professional Team</h2>
            </div>
        </div>
        <div class="row">
            @foreach($teams as $team )
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch"
                            style="background-image: url({{'../images/'.$team->photo}});"></div>
                    </div>
                    <div class="text pt-3 text-center">
                        <a href="/en-team">
                            <h3 style="color:#2F3195;">{{$team->en_name}}</h3>
                        </a>
                        <span class="position mb-2" style="color: black;">{{$team->en_specialization}}</span>
                        <div class="faded">
                            <!-- <p>I am an ambitious workaholic, but apart from that, pretty simple person.</p> -->
                            <ul class="ftco-social text-center">
                                <li class="ftco-animate"><a href="{{$team->twit}}"><span
                                            class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="{{$team->face}}"><span
                                            class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="{{$team->google}}"><span
                                            class="icon-google-plus"></span></a></li>
                                <li class="ftco-animate"><a href="{{$team->insta}}"><span
                                            class="icon-instagram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@include('en-parts._numbers')
{{-- Clients --}}
<br>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid p-0">
        <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <span class="subheading">Clients</span>
                <h2 class="mb-4">Our Clients</h2>
            </div>
        </div>

        <div class="row no-gutters">
            @foreach ($clients as $client)
            <div class="col-md-3">
                <div class="">
                    <img style="margin-left: 30%; margin-bottom: 12%;" class="img-fluid" src="{{'images/'.$client->photo}}" >
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
{{-- News --}}
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row ftco-animate">
            <div class="col-xl-1 d-xl-block d-none"></div>
            <div class="col-md-6 col-lg-6 col-xl-7" style="direction:ltr;">
                <div class="heading-section ftco-animate mb-5">
                    <span class="subheading">News</span>
                    <h2 class="mb-4">Last News</h2>
                </div>
                <div class="carousel-testimony owl-carousel">
                    @foreach($news as $new)
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="text bg-light p-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                                {!!str_limit(strip_tags($new->en_details) , 100 )!!}
                                @if(strLen(strip_tags($new->en_details)) > 100)
                                <a href="/en-news/{{$new->id}}" style="font-size: 11px;"> Red more </a>
                                @endif
                                <p class="name">{{$new->en_title}}</p>
                                <span
                                    class="position">{{ Carbon\Carbon::parse($new->created_at)->format('M , j , Y')}}</span>
                            </div>
                            <div class="user-img" style="background-image: url(/images/{{$new->photo}})">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>


@endsection
