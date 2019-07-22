@extends('dashboard.metronic')
@section('title', ' جدول الأخبار')
<!-- BEGIN CSS -->
@section('stylesheets')
<link rel="stylesheet" href="{{ asset('vendor/plugins/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}">
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
            <a href="{{route('news.index')}}">الأخبار</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> الشركات </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول الأخبار</span>
        </div>
    </div>
    <div class="portlet-body">
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        <button data-toggle="modal" class="btn sbold green" href="#add_new"> أضافة أخبار
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN TABLE -->
        <div class="">
            <table id="news-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>العنوان</th>
                        <th>التفاصيل</th>
                        <th>Title</th>
                        <th>Details</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                              
                <tbody>
                    @foreach($news as $new)
                    <tr>
                        <td>{{$new->id}}</td>
                        <td>{{$new->ar_title}}</td>
                        <td>{{str_limit(strip_tags($new->ar_details) , $limit = 30 , $end = '...')}}</td>
                        <td>{{$new->en_title}}</td>
                        <td>{{str_limit(strip_tags($new->en_details) , $limit = 30 , $end = '...')}}</td>
                        <td>
                            <form action="{{route('news.destroy', $new->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }}
                                <a href="{{route('news.edit', $new->id)}}"
                                    class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit"> تعديل </i>
                                </a>
                                <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit">حذف</i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END TABLE -->
    </div>
</div>
<!-- END DATATABLE -->

<!-- BEGIN ADD_new MODEL -->
<div class="modal fade in" id="add_new">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة أخبار</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>العنوان</label>
                        <input type="text" name="ar_title" class="form-control" placeholder="العنوان" required>


                        <label>التفاصيل</label>
                        <textarea name="ar_details" class="form-control ck_editor" >{{old('ar_details')}}</textarea>

                        <label>Title</label>
                        <input type="text" name="en_title" class="form-control" placeholder="title" required>


                        <label>Details</label>
                        <textarea name="en_details" class="form-control ck_editor" >{{old('en_details')}}</textarea>
                        
                        <label>صورة</label>
                        <input id="photo" type="file" name="photo" multiple>

                    </div>
                    <div class="margin-top-10">
                        <button type="submit" class="btn btn-outline sbold green">أضافة</button>
                        <button type="button" class="btn btn-outline sbold red" data-dismiss="modal">أغلاق</button>
                    </div>
                </form>
            </div>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- BEGIN ADD_new MODEL -->

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#news-table').DataTable();
    });

</script>
@endsection
<!-- END SCRIPTS -->
