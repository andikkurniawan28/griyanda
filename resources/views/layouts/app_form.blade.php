@extends("layouts.app")

@section("content")
@yield("breadcrumb")
@include("components.alert")
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">@yield("title")</h4>
    </div>
    <div class="card-body">
        @yield("form")
    </div>
</div>
@endsection
