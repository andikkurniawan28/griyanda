<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route("dashboard") }}">{{ ucfirst("dashboard") }}</a></li>
        <li class="breadcrumb-item"><a href="@yield("index")">@yield("title")</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create @yield("title")</li>
    </ol>
</nav>
