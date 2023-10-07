@extends("layouts.app_form")

@section("title")
    {{ ucfirst("wilayah") }}
@endsection

@section("index")
    {{ route("wilayah.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("wilayah.store") }}" method="POST">
        @csrf @method("POST")
        <x-select1 name="area_id" title="area" :data="$env['area']" item="name"></x-select1>
        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
