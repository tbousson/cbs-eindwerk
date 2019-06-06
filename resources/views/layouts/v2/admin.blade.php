<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>@yield('title', 'Mudking Comics | Admin')</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <!-- AnimateCSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
  <!-- Material Kit CSS -->
  <link href="{{asset("assets/css/material-dashboard.css?v=2.1.0")}}" rel="stylesheet" />
  <link href="{{asset("assets/css/adminv2.css")}}" rel="stylesheet" />
  @yield('head')
</head>

<body class="dark-edition">
  <div class="wrapper ">
    @include('layouts.v2.sidebar')
    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.v2.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          @yield('content')
          
        </div>
      </div>
     {{-- @include('footer') --}}
    </div>
  </div>
  @include('layouts.v2.scripts')
  @yield('js')
  @include('layouts.v2.notify-message')
</body>

</html>