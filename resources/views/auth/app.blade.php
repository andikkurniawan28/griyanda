@include("auth.style")
<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            @yield("form")
                            <hr>
                            @yield("to-Other")
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include("auth.script")
</body>
</html>
