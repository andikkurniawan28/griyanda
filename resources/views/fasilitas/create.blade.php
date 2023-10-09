@extends("layouts.app_form")

@section("title")
    {{ ucfirst("fasilitas") }}
@endsection

@section("index")
    {{ route("fasilitas.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("fasilitas.store") }}" method="POST">
        @csrf @method("POST")
        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-input1 name="icon" type="text" value="" placeholder="Enter icon ..." modifier="required"></x-input1>
        <x-submit></x-submit>
    </form>
@endsection
