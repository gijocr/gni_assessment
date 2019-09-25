<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
  @include('admin._includes.header')


  <div class="container-fluid">
    <div class="row">
      @include('admin._includes.navigation')

      <main class="col-md-9 col-lg-10 ml-sm-auto p-4">
        <div class="row justify-content-center">
          <div class="col-md-10 col-lg-8">
            @yield('content')
          </div>
        </div>
      </main>
    </div>
  </div>
</body>

</html>