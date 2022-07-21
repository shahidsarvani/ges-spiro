<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') - GES-SPIRO</title>

    @include('layouts.scripts')

</head>

<body>
    @include('layouts.header')
    <!-- Page content -->
    <div class="page-content">
        @include('layouts.sidebar')
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Content area -->
            <div class="content">
                @include('alert')
                @yield('content')
            </div>
            <!-- /content area -->
            @include('layouts.footer')
        </div>
        <!-- /main content -->
    </div>
    <!-- /page content -->
</body>

</html>
