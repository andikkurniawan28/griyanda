@extends("layouts.app_table")

@section("title")
    {{ ucfirst("unit") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb1></x-breadcrumb1>
@endsection

@section("create")
    {{ route("unit.create") }}
@endsection

@section("table")
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("timestamp") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("tipe") }}</th>
                <th>{{ ucfirst("area") }}</th>
                <th>{{ ucfirst("pemilik") }}</th>
                <th>{{ ucfirst("skema") }}</th>
                <th>{{ ucfirst("fasilitas") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->tipe->name }}</td>
                <td>{{ $data->area->name }}</td>
                <td>{{ $data->pemilik->name }}</td>
                <td>
                    @foreach($env["skema"] as $skema)
                        @if($data->{$skema->name} != NULL)
                            <li>{{ $skema->name }} : Rp.{{ number_format($data->{$skema->name}) }}</li>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($env["fasilitas"] as $fasilitas)
                        @if($data->{$fasilitas->name} != NULL)
                            <li>{{ $fasilitas->name }} : {{ $data->{$fasilitas->name} }}</li>
                        @endif
                    @endforeach
                </td>
                <td>
                    @include("components.action_group_button", [
                        "show"      => route("unit.show", $data->id),
                        "edit"      => route("unit.edit", $data->id),
                        "delete"    => route("unit.destroy", $data->id),
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
