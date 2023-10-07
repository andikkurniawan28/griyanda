@extends("layouts.app_form")

@section("title")
    {{ ucfirst("unit") }}
@endsection

@section("index")
    {{ route("unit.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb2></x-breadcrumb2>
@endsection

@section("form")
    <form action="{{ route("unit.store") }}" method="POST">
        @csrf @method("POST")
        @csrf @method("POST")
        <x-select1 name="area_id" title="area" :data="$env['area']" item="name"></x-select1>
        <x-select1 name="pemilik_id" title="pemilik" :data="$env['pemilik']" item="name"></x-select1>

        <x-input1 name="name" type="text" value="" placeholder="Enter name ..." modifier="required autofocus"></x-input1>

        @foreach($env["skema"] as $skema)
        <x-input1 name="{{ $skema->name }}" type="number" value="" placeholder="Masukkan harga untuk {{ $skema->name }} ..." modifier=""></x-input1>
        @endforeach

        @foreach($env["fasilitas"] as $fasilitas)
        <x-input1 name="{{ $fasilitas->name }}" type="number" value="" placeholder="Masukkan jumlah {{ $fasilitas->name }} ..." modifier=""></x-input1>
        @endforeach

        <x-submit></x-submit>
    </form>
@endsection
