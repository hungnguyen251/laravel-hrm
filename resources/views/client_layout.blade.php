@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Home')</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('blocks.header')
        @include('blocks.navbar')
        @include('blocks.sidebar')

        @section('content')
        @show
        
        @include('blocks.footer')
        <aside class="control-sidebar control-sidebar-dark"></aside>
        @include('blocks.scripts')
    </div>
</body>
</html>
@else
    @include('blocks.header')
    @include('forms.navigation')
@endif