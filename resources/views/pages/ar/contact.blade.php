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
@endsection
