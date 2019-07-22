@extends('dashboard.metronic')
@section('title', ' جدول شوؤن تنظيمية')
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
            <a href="{{route('sales.index')}}">مبيعات</a>
            <i class="fa fa-circle"></i>
        </li>
    </ul>
</div>
<!-- END PAGE-BAR -->

<h3 class="page-title"> مبيعات </h3>

<!-- BEGIN DATATABLE -->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="icon-social-dribbble font-green"></i>
            <span class="caption-subject font-green bold uppercase">جدول مبيعات</span>
        </div>
    </div>
    <div class="portlet-body">

        <!-- BEGIN TABLE -->
        <div class="">
            <table id="sales-table" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th> # </th>
                        <th>العنوان</th>
                        <th>Detail</th>
                        <th>العمليات</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($sales as $sale)
                    <tr>
                        <td>{{$sale->id}}</td>
                        <td>{{str_limit(strip_tags($sale->ar_detail) ,  $limit = 30, $end ='...')}}</td>
                        <td>{{str_limit(strip_tags($sale->en_detail) ,  $limit = 30, $end ='...')}}</td>
                        <td>
                            {{-- <form action="{{route('sales.destroy', $sale->id)}}" method="POST">
                                @csrf {{ method_field('DELETE') }} --}}
                                <a href="{{route('sales.edit', $sale->id)}}"
                                    class="btn dark btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit"> تعديل </i>
                                </a>
                                {{-- <button type="submit" class="btn red btn-sm btn-outline sbold uppercase">
                                    <i class="fa fa-edit">حذف</i>
                                </button> --}}
                            {{-- </form> --}}
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

@endsection

<!-- BEGIN SCRIPTS -->
@section('scripts')
<script src="{{ asset('vendor/js/datatable.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"></script>
<script>
    //Datatable
    $(document).ready(function () {
        $('#sales-table').DataTable();
    });

</script>
@endsection
<!-- END SCRIPTS -->
