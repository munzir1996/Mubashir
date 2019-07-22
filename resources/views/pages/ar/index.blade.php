@extends('layouts.master')

@section('title', ' | الرئسيه')

@section('content')
<section class="home-slider owl-carousel" style="direction:ltr">
    <div class="slider-item" style="background-image:url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
                <div class="col-md-6 text ftco-animate pl-md-5">
                    <h1 class="mb-4">Base Construction <span>Build The Future</span></h1>
                    <h3 class="subheading">A small river named Dudar flows by their place and supplies it with the
                        necessary regelialia</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="slider-item" style="background-image:url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-end" data-scrollax-part="true">
                <div class="col-md-6 text ftco-animate pl-md-5">
                    <h1 class="mb-4">We Turn Your <span>Vision Into Reality</span></h1>
                    <h3 class="subheading">A small river named Dudar flows by their place and supplies it with the
                        necessary regelialia</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<br><br>
<section class="ftco-services ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">المنتجات</span>
                <h2 class="mb-4">منتجات الشركه</h2>
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
                        <a href="/ar-product/desc/{{$product->id}}">
                            <h3 style="color:#2F3195; text-decoration: none !important;">{{ $product->ar_name}}</h3>
                        </a>
                        <span style="color: black;" class="position mb-2">
                            {{str_limit(strip_tags($product->ar_description) , $limit =20 , $end ='...')}}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</section>

{{-- team --}}
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
                        <div class="img align-self-stretch"
                            style="background-image: url({{'../images/'.$team->photo}});"></div>
                    </div>
                    <div class="text pt-3 text-center">
                        <a href="/ar-team">
                            <h3>{{$team->ar_name}}</h3>
                        </a>
                        <span class="position mb-2">{{$team->ar_specialization}}</span>
                        <div class="faded">
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

{{-- projects --}}
{{-- <section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid p-0">
        <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <span class="subheading">المشاريع</span>
                <h2 class="mb-4">مشاريع الشركه</h2>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach($projects as $project)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="project">
                    <img src="{{'images/'.$project->photo}}" class="img-fluid" alt="Colorlib Template">
                    <div class="text">
                        <span>{{$project->ar_name}}</span>
                        <h3><a
                                href="/desc/{{$project->id}}">{{ str_limit(strip_tags($project->ar_description) , $limit ='20' , $end = '...' )}}</a>
                        </h3>
                    </div>
                    <a href="{{'images/'.$project->photo}}"
                        class="icon image-popup d-flex justify-content-center align-items-center">
                        <span class="icon-expand"></span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section> --}}
<!-- numbers here -->
@include('ar-parts._numbers')

{{-- Clients --}}
<br>
<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container-fluid p-0">
        <div class="row no-gutters justify-content-center mb-5 pb-2">
            <div class="col-md-6 text-center heading-section ftco-animate">
                <span class="subheading">العملاء</span>
                <h2 class="mb-4">عملاء الشركه</h2>
            </div>
        </div>
        <div class="row no-gutters">
            @foreach ($clients as $client)
            <div class="col-md-4">
                <div class="">
                    <img style="margin-right: 30%; margin-bottom: 12%;" class="img-fluid" src="{{'images/'.$client->photo}}">
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
                    <span class="subheading">الاخبار</span>
                    <h2 class="mb-4">اخر الاخبار</h2>
                </div>
                <div class="carousel-testimony owl-carousel">
                    @foreach($news as $new)
                    <div class="item">
                        <div class="testimony-wrap">
                            <div class="text bg-light p-4">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                                {{str_limit(strip_tags($new->ar_details) , 100 )}}
                                @if(strLen(strip_tags($new->ar_details)) > 100)
                                <a href="/ar-news/{{$new->id}}" style="font-size: 11px; color:red;"> اقرء المزيد </a>
                                @endif
                                <p class="name">{{$new->ar_title}}</p>
                                <span
                                    class="position">{{Carbon\Carbon::parse($new->created_at)->format('M , j , Y , G:i:s')}}</span>
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
@stop
