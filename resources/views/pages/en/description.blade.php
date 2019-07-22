@extends('layouts.master2')

@section('title' , ' | Description')

@section('content')
<section class="ftco-section">
          <div class="container">
              <div class="row no-gutters">
                  <div class="col-md-5 p-md-5 img img-2 mt-5 mt-md-0" style="background-image: url({{'../images/'.$project->photo}});">
                  </div>
                <div class="col-md-7 wrap-about py-5 px-4 px-md-5 ftco-animate">
              <div class="heading-section mb-5">
                <h2 class="mb-4">{{$project->en_name}}</h2>
             </div>
        <div class="">
          {!! $project->en_description !!}
      </div>
    </div>
   </div>
  </div>
</section>
@stop