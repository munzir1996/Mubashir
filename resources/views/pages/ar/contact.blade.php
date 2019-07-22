@extends('layouts.master')

@section('title','| واصلنا')

@section('content')

<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
    <div class="container">
        <div class="row d-flex align-items-stretch no-gutters">
            <div class="col-md-6 p-4 p-md-5 order-md-last">

                <form action="{{route('contacts.store.ar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="الاسم" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="البريد اللاكتروني"
                            value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subj" placeholder="الموضوع"
                            value="{{old('subj')}}">
                    </div>
                    <div class="form-group">
                        <textarea name="msg" id="" cols="30" rows="5" class="form-control" placeholder="رساله"
                            value="{{old('msg')}}" onkeyup="countChar(this)"></textarea>
                        <code id="CharNum">500</code>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="إرســـال" class="btn btn-info py-3 px-5">
                    </div>
                </form>
            </div>
            <div class="col-md-3 p-md-2" style="margin-top: 27px;">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>العنوان : </span>
                        Sudan - Khartoum - Alsouqe Alarabi - Siddigo Building</p>
                </div>
                <br>
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>البريد الألكتروني : </span>
                        mobashir_100@yahoo.com</p>
                </div>
            </div>
            <div class="col-md-3 p-md-2" style="margin-top: 27px;">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>المبنى : </span>
                        Vet Complex - Third floor - Office No.301</p>
                </div>

            </div>
        </div>
    </div>
</section>
{{--
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h4">معلومات التواصل</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>العنوان : </span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>تلفون : </span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>البريد الاكتوني : </span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="bg-light d-flex align-self-stretch box p-4">
                    <p><span>الموقع اللاكتروني : </span> <a href="#">yoursite.com</a></p>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection
