<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IdeaHub') }}</title>

    {{-- css --}}
    @section('htmlheader')
        @include('layouts.partials.htmlheader')
    @show
</head>
<body>
    <div id="app">
        {{-- navbar --}}
        @include('layouts.partials.header')

        <main class="py-4">
            @yield('content')
        </main>

        {{-- footer --}}
        <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; IdeaHub 2019</p>
            </div>
            <!-- /.container -->
        </footer>

        {{-- scripts --}}
        @section('script')
            @include('layouts.partials.scripts')
        @show

    </div>
</body>
</html>
