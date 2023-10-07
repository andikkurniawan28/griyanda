@extends("layouts.app_form")

@section("title")
    {{ ucfirst("wilayah") }}
@endsection

@section("index")
    {{ route("wilayah.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb3></x-breadcrumb3>
@endsection

@section("form")
    <form action="{{ route("wilayah.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <x-select2 name="area_id" title="area" item="name" :data="$env['area']" :feed="$data->area_id"></x-select2>
        <x-input1 name="name" type="text" value="{{ $data->name }}" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
