<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/bootstrap-4.5.0/css/bootstrap.min.css') }}" data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/font-awesome-4.7.0/css/font-awesome.min.css') }}" data-type="keditor-style" />
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/editor-2.0.1/css/keditor.min.css') }}" data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/editor-2.0.1/css/keditor-components.min.css') }}" data-type="keditor-style" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/color-chooser/light.min.css') }}" data-type="keditor-style" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/code-prettify/src/prettify.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/editor-2.0.1/css/examples.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/dep/icon-chooser/css/fontawesome-iconpicker.min.css') }}" />


    @yield('styles')
    <title>Document</title>
</head>

<body>

    @yield('content')




    <script type="text/javascript" src="{{ asset('assets/plugins/dep/jquery-1.11.3/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/bootstrap-4.5.0/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
{{--    {{ asset('assets/plugins/dep/jquery.nicescroll-3.6.6/jquery.nicescroll.min.js') }}--}}

    <script type="text/javascript" src="{{ asset('assets/plugins/dep/ckeditor-4.11.4/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/formBuilder-2.5.3/form-builder.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/formBuilder-2.5.3/form-render.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/plugins/dep/icon-chooser/js/fontawesome-iconpicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/color-chooser/default-picker.min.js') }}"></script>
    <!-- Start of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-2.0.1/js/keditor.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-2.0.1/js/keditor-components.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-2.0.1/js/keditor-options.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-2.0.1/js/keditor-photo.js') }}"></script>
    <!-- End of KEditor scripts -->
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/code-prettify/src/prettify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/js-beautify-1.7.5/js/lib/beautify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/dep/js-beautify-1.7.5/js/lib/beautify-html.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/plugins/editor-2.0.1/js/examples.js') }}"></script>

    @yield('scripts')
    @yield('script')

</body>

</html>
