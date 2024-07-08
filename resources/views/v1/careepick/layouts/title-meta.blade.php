@php
    $pageName = Route::currentRouteName();
    $pageMeta = App\Models\v1\careepick\PageMetaInfo::where('page_name', $pageName)->first();
@endphp

<meta charset="UTF-8">
<title>{{ $pageMeta->title ?? 'Default Title' }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="robots" content="index, follow">
<meta name="description" content="{{ $pageMeta->meta_description ?? 'Default Description' }}">
<meta name="author" content="{{ $pageMeta->meta_author_name ?? 'Default Author' }}">
<meta name="keywords" content="{{ $pageMeta->meta_keywords ?? 'keyword1, keyword2, keyword3' }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{!! csrf_token() !!}" />
{{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

<!-- Favicon Icon -->
<link rel="shortcut icon" href="{{ URL::asset('assets/img/web/favicon.png')}}" />
