<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/dep/bootstrap-3.3.6/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/dep/font-awesome-4.5.0/css/font-awesome.min.css') }}" />
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/editor-1.7/css/keditor.min.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/plugins/editor-1.7/css/keditor-components.min.css') }}" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/code-prettify/src/prettify.css') }}" />
    @yield('styles')
    <title>Document</title>
</head>

<body>

    @yield('content')

    <script type="text/javascript" src="{{ asset('assets/plugins/dep/jquery-1.11.3/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/bootstrap-3.3.6/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/jquery.nicescroll-3.6.6/jquery.nicescroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/ckeditor-4.5.6/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/ckeditor-4.5.6/adapters/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/formBuilder-2.5.3/form-builder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/formBuilder-2.5.3/form-render.min.js') }}"></script>
    <!-- Start of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-1.7/js/keditor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-1.7/js/keditor-components.min.js') }}"></script>
    <!-- End of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/code-prettify/src/prettify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/js-beautify-1.7.5/js/lib/beautify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/js-beautify-1.7.5/js/lib/beautify-html.js') }}"></script>
    @yield('scripts')
    @yield('script')

</body>

</html>