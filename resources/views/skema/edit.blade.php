@extends("layouts.app_form")

@section("title")
    {{ ucfirst("skema") }}
@endsection

@section("index")
    {{ route("skema.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb3></x-breadcrumb3>
@endsection

@section("form")
    <form action="{{ route("skema.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <x-input1 name="name" type="text" value="{{ $data->name }}" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
