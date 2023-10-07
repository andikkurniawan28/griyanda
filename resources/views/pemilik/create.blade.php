@extends("layouts.app_form")

@section("title")
    {{ ucfirst("pemilik") }}
@endsection

@section("index")
    {{ route("pemilik.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("pemilik.store") }}" method="POST">
        @csrf @method("POST")
        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
