@extends("layouts.app_form")

@section("title")
    {{ ucfirst("skema") }}
@endsection

@section("index")
    {{ route("skema.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("skema.store") }}" method="POST">
        @csrf @method("POST")
        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
