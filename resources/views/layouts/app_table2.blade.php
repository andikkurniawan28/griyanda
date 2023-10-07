@extends("layouts.app")

@section("additional_style")
    <link href="./sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section("content")
@yield("breadcrumb")
@include("components.alert")
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">@yield("title")</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <br>
            @yield("table")
        </div>
    </div>
</div>
@endsection

@section("additional_script")
    <script src="./sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="./sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="./sbadmin2/js/demo/datatables-demo.js"></script>
@endsection
