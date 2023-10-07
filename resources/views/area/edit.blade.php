@extends("layouts.app_form")

@section("title")
    {{ ucfirst("area") }}
@endsection

@section("index")
    {{ route("area.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb3></x-breadcrumb3>
@endsection

@section("form")
    <form action="{{ route("area.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <x-input1 name="name" type="text" value="{{ $data->name }}" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
