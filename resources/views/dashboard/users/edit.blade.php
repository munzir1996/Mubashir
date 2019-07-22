@extends('dashboard.metronic')
@section('content')
<!-- BEGIN PAGE-BAR -->
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="{{route('admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{route('admins.index')}}">الأدمن</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title">تعديل الأدمن </h3>

<form action="{{ route('admins.update', $user->id) }}" method="POST">
    @csrf {{ method_field('PUT') }}
    <div class="form-group">
        <label>العنوان</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
    </div>
    <div class="form-group">
        <label>الأيميل</label>
        <input type="email" name="email" class="form-control" value="{{$user->email}}" required>
    </div>

    <div class="form-group">
        <label>كلمة المرور</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
        <label> تأكيد كلمة المرور</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>
    
    <div class="margin-top-10">
        <button type="submit" class="btn green"> حفظ التعديل </button>
    </div>

</form>

@endsection