@extends("auth.app")

@section("form")

    <div class="text-center">
        <h1 class="h4 text-gray-900 mb-4">{{ ENV("APP_NAME") }} {{ ucfirst("login") }}</h1>
    </div>

    @include("components.alert")

    <form class="user" action="{{ route("login.process") }}" method="POST">
        @csrf @method("POST")
        <div class="form-group">
            <input type="text" class="form-control form-control-user" placeholder="Enter username..."
            id="username" name="username" required autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-user"
            id="password" placeholder="Enter password..." id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{ ucfirst("login") }}
        </button>
    </form>
@endsection

@section("to-Other")
    {{-- <div class="text-center">
        <a class="small" href="{{ route("changePassword") }}">{{ ucfirst("forgot password ?") }}</a>
    </div> --}}
    <div class="text-center">
        <a class="small" href="{{ route("register") }}">{{ ucfirst("register") }}</a>
    </div>
@endsection

