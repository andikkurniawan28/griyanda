@extends("layouts.app_form")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("index")
    {{ route("user.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("user.store") }}" method="POST">
        @csrf @method("POST")
        <x-select1 name="role_id" title="role" :data="$role" item="name"></x-select1>
        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-input1 name="username" type="text" value="" placeholder="Enter username ..." modifier="required"></x-input1>
        <x-input1 name="password" type="password" value="" placeholder="Enter password ..." modifier="required"></x-input1>
        <x-input2 name="is_active" type="number" value="" placeholder="Enter is_active ..." min="0" max="1" modifier="required"></x-input2>
        <x-submit></x-submit>
    </form>
@endsection
