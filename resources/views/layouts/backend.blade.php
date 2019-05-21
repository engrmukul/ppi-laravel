<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>
</head>
<body>

@include('backend.partials._navbar')

<div class="container-fluid">
    <div class="row">
        @include('backend.partials._sidebar')

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            @yield('main')
        </main>
    </div>
</div>
<script src="{{ mix('js/backend.js') }}"></script>
</body>
</html>
