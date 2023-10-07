@extends("layouts.app_table")

@section("title")
    {{ ucfirst("area") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb1></x-breadcrumb1>
@endsection

@section("create")
    {{ route("area.create") }}
@endsection

@section("table")
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("timestamp") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->name }}</td>
                <td>
                    @include("components.action_group_button", [
                        "show"      => route("area.show", $data->id),
                        "edit"      => route("area.edit", $data->id),
                        "delete"    => route("area.destroy", $data->id),
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
