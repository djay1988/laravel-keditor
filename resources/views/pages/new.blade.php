@extends('layouts.main')
@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div data-keditor="html" style="height: 600px;">
                <div id="content-area"></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('script')
    <script type="text/javascript" data-keditor="script">
        $(function () {
            $('#content-area').keditor({
                title: 'New Page',
                // testing configs
                onReady: function () {
                    var backBtn = $("<a href='{{ route('editor') }}' class='keditor-ui keditor-topbar-btn'><i class='fa fa-arrow-left' style='color:#ff5e00' title='Back to Pages'></i></a>");
                    $(this.topbar[0]).find('.keditor-ui.keditor-topbar-right').prepend(backBtn);
                    $(this.topbar[0]).find('.keditor-ui.keditor-topbar-right  i.fa-save').css({color: '#199c09'});
                },
                onSave: function (t) {
                    console.log(t);
                },
                // END testing configs
                snippetsUrl: "{{ asset('assets/plugins/editor-2.0.1/snippets/snippets.blade.html') }}",
                containerSettingEnabled: true,
                containerSettingInitFunction: function (form, keditor) {
                    settingPanelFunction(form, keditor);
                },
                containerSettingShowFunction: function (form, container, keditor) {
                    // Find '.row' div
                    // Note: Make sure you have a div for setting background color
                    var row = container.find('.row');
                    // User "prop()" method to get properties of HTML element
                    var backgroundColor = row.prop('style').backgroundColor || '';
                    // User 'backgroundColor' for value of background color textbox
                    form.find('.txt-bg-color').val(backgroundColor);
                },
                containerSettingHideFunction: function (form, keditor) {
                    // Clean value of background color textbox when hiding settings form
                    form.find('.txt-bg-color').val('');
                }
            });
        });

        function settingPanelFunction(form, keditor) {

            form.append(
                '<form class="form-horizontal">' +
                '   <div class="form-group">' +
                '       <div class="col-sm-12">' +
                '           <label>Background Color :</label>'+
                '           <input type="text" name="color" class="form-control color-input" id="bg-color-input">' +
                '       </div>' +
                '       <div class="col-sm-12">' +
                '           <label>Color :</label>'+
                '           <input type="text" name="color" class="form-control color-input" id="fg-color-input">' +
                '       </div>' +
                '   </div>' +
                '</form>'
            );

            var colorPickerBg = new ColorPicker.Default('#bg-color-input', {hexOnly: true});
            var colorPickerFg = new ColorPicker.Default('#fg-color-input', {hexOnly: true});

            colorPickerBg.on('change', function (color) {
                // row.css('background-color', color);
                let container = keditor.getSettingContainer();
                let row = container.find('.row');
                if (!container.hasClass('keditor-sub-container')) {
                    row = row.filter(function () {
                        return $(this).parents('.keditor-container').length === 1;
                    });
                }
                container.css('background-color', color.hex);
            });
            colorPickerFg.on('change', function (color) {
                let container = keditor.getSettingContainer();
                let row = container.find('.row');
                if (!container.hasClass('keditor-sub-container')) {
                    row = row.filter(function () {
                        return $(this).parents('.keditor-container').length === 1;
                    });
                }
                container.css('color', color.hex);
            });

        }

    </script>
@endsection
