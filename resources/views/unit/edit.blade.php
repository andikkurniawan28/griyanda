@extends("layouts.app_form")

@section("title")
    {{ ucfirst("unit") }}
@endsection

@section("index")
    {{ route("unit.index") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb3></x-breadcrumb3>
@endsection

@section("form")
    <form action="{{ route("unit.update", $data->id) }}" method="POST">
        @csrf @method("PUT")
        <x-select2 name="area_id" title="area" item="name" :data="$env['area']" :feed="$data->area_id"></x-select2>
        <x-select2 name="pemilik_id" title="pemilik" item="name" :data="$env['pemilik']" :feed="$data->pemilik_id"></x-select2>

        <x-input1 name="name" type="text" value="{{ $data->name }}" placeholder="Enter name ..." modifier="required autofocus"></x-input1>

        @foreach($env["skema"] as $skema)
        <x-input1 name="{{ $skema->name }}" type="number" value="{{ $data->{$skema->name} }}" placeholder="Masukkan harga untuk {{ $skema->name }} ..." modifier=""></x-input1>
        @endforeach

        @foreach($env["fasilitas"] as $fasilitas)
        <x-input1 name="{{ $fasilitas->name }}" type="number" value="{{ $data->{$fasilitas->name} }}" placeholder="Masukkan jumlah {{ $fasilitas->name }} ..." modifier=""></x-input1>
        @endforeach

        <x-submit></x-submit>
    </form>
@endsection
