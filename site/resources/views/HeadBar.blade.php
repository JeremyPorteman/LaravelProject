<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('/css/headbar.css') }}">
        <link rel="stylesheet" href="{{ asset('/css/container.css') }}">
    </head>
    <body>
        @section('bar')
            <nav class="navbar">
                <a href="{{ url('/tools') }}">Tools<a>
                <a href="{{ url('/invoices') }}">Invoices<a>
                <a href="{{ url('/search') }}">Search<a>
                <a href="{{ url('/logs') }}">Logs<a>
            </nav>
        @show

        <div class="container">
            @yield('pageContent')
        </div>
    </body>
</html>