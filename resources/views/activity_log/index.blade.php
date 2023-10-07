@extends("layouts.app_table2")

@section("title")
    {{ ucfirst("activity log") }}
@endsection

@section("breadcrumb")
    <x-breadcrumb1></x-breadcrumb1>
@endsection

@section("table")
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>{{ strtoupper("id") }}</th>
                <th>{{ ucfirst("timestamp") }}</th>
                <th>{{ ucfirst("description") }}</th>
                <th>{{ ucfirst("data") }}</th>
                <th>{{ ucfirst("user") }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $data)
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->data }}</td>
                <td>{{ $data->user->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
