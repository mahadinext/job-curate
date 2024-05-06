@yield('css')

<!-- Stylesheets -->
{{-- <link href="{{ URL::asset('dashboard/assets/css/bootstrap.css') }}" rel="stylesheet"> --}}
<link href="{{ URL::asset('dashboard/assets/css/style.css') }}" rel="stylesheet">
<link href="{{ URL::asset('dashboard/assets/css/responsive.css') }}" rel="stylesheet">
<link href="{{ URL::asset('dashboard/assets/css/custom.css') }}" rel="stylesheet">

<!--Jquery-->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<!-- Include jQuery UI -->
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

@include('v1.careepick.pages.common.ajax-setup')

<!--select2 cdn-->
{{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}

{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
