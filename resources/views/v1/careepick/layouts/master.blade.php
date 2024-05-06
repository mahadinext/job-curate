<!doctype html >
<html lang="en">

<head>
    @include('v1.careepick.layouts.title-meta')
    @include('v1.careepick.layouts.head-css')
</head>

@section('body')
    @include('v1.careepick.layouts.body')
@show

    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <div id="toastr-alerts-container"></div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- Begin page -->
        @include('v1.careepick.layouts.menu')
        @yield('content')

        <!-- End Page-content -->
        @include('v1.careepick.layouts.footer')
        {{-- @include('v1.careepick.common.modal.delete')
        @include('v1.careepick.layouts.custom-ajax-script') --}}
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- JAVASCRIPT -->
    @include('v1.careepick.layouts.vendor-scripts')
</body>

</html>
