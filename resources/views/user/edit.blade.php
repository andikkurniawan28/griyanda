@extends("layouts.app_form")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("index")
    {{ route("user.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb3></x-breadcrumb3>
@endsection

@section("form")
    <form action="{{ route("user.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <x-select2 name="role_id" title="role" item="name" :data="$role" :feed="$data->role_id"></x-select2>
        <x-input1 name="name" type="text" value="{{ $data->name }}" placeholder="Enter name ..." modifier="required autofocus"></x-input1>
        <x-input1 name="username" type="text" value="{{ $data->username }}" placeholder="Enter username ..." modifier="required"></x-input1>
        <x-input2 name="is_active" type="number" value="{{ $data->is_active }}" placeholder="Enter is_active ..." min="0" max="1" modifier="required"></x-input2>
        <x-submit></x-submit>
    </form>
@endsection
