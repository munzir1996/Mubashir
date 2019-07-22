@extends('dashboard.metronic')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{asset('vendor/css/bootstrap-fileinput.css')}}" />
@endsection
<!-- END CSS -->

@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('supports.index')}}">الدعم الفنى</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title">تعديل الدعم الفنى </h3>

<form action="{{ route('supports.update', $support->id) }}" method="POST" enctype="multipart/form-data">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
        <label>التفاصيل</label>
        <textarea name="ar_detail" class="form-control ck_editor">{{$support->ar_detail}}</textarea>
    </div>

    <div class="form-group">
        <label>Detail</label>
        <textarea name="en_detail" class="form-control ck_editor">{{$support->en_detail}}</textarea>
    </div>
    <div class="margin-top-10">
        <button type="submit" class="btn green"> حفظ التعديل </button>
    </div>
</form>
@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{asset('vendor/js/bootstrap-fileinput.js')}}" type="text/javascript"></script>
<script>
    $('.fileinput').fileinput()
</script>
@endsection
<!-- END SCRIPTS -->
