<!doctype html>
<html lang="en">

<head>
    @include('v1.careepick.dashboard.layouts.title-meta')
    @include('v1.careepick.dashboard.layouts.head-css')
</head>

@section('body')
    @include('v1.careepick.dashboard.layouts.body')
@show

<div class="page-wrapper dashboard">

    <!-- Preloader -->
    <div class="preloader"></div>

    @include('v1.careepick.dashboard.layouts.jp-topbar')

    <div id="toastr-alerts-container"></div>

    <section class="user-dashboard">
        <div class="dashboard-outer">

            @yield('content')

            @include('v1.careepick.dashboard.layouts.footer')
        </div>
    </section>

    <!-- JAVASCRIPT -->
    @include('v1.careepick.dashboard.layouts.vendor-scripts')
    </body>

</html>
