@extends("layouts.app_table")

@section("title")
    {{ ucfirst("user") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb1></x-breadcrumb1>
@endsection

@section("create")
    {{ route("user.create") }}
@endsection

@section("table")
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("timestamp") }}</th>
                <th>{{ ucfirst("role") }}</th>
                <th>{{ ucfirst("name") }}</th>
                <th>{{ ucfirst("username") }}</th>
                <th>{{ ucfirst("is_active") }}</th>
                <th>{{ ucfirst("action") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->role->name }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->is_active }}</td>
                <td>
                    @include("components.action_group_button", [
                        "show"      => route("user.show", $data->id),
                        "edit"      => route("user.edit", $data->id),
                        "delete"    => route("user.destroy", $data->id),
                    ])
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
