@extends('layouts.main')
@section('styles')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route('editor') }}">Back to Pages</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div data-keditor="html" style="height: 600px;">
                <div id="content-area"></div>
            </div>
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
            title:'New Page',
            // testing configs
            onReady:function(){
                var backBtn = $("<a href='/home' class='keditor-ui keditor-topbar-btn'><i class='fa fa-arrow-left' style='color:#ff5e00' title='Back to Pages'></i></a>");
                $(this.topbar[0]).find('.keditor-ui.keditor-topbar-right').prepend(backBtn);
                $(this.topbar[0]).find('.keditor-ui.keditor-topbar-right  i.fa-save').css({color:'#199c09'});
            },
            onSave:function(t){
                console.log(t);
            },
            // END testing configs
            snippetsUrl: "{{ asset('assets/plugins/editor-2.0.1/snippets/snippets.blade.html') }}",
            containerSettingEnabled: true,
            containerSettingInitFunction: function (form, keditor) {
                // Add control for settings form
                form.append(
                    '<div class="form-horizontal">' +
                    '   <div class="form-group">' +
                    '       <div class="col-sm-12">' +
                    '           <label>Background color</label>' +
                    '           <input type="text" class="form-control txt-bg-color" />' +
                    '       </div>' +
                    '   </div>' +
                    '</div>'
                );

                // Add event handle for background color textbox
                form.find('.txt-bg-color').on('change', function () {
                    // Get current setting container
                    var container = keditor.getSettingContainer();
                    // Find '.row' for setting background color
                    // Note: Make sure you have a div for setting background color
                    var row = container.find('.row');
                    if (container.hasClass('keditor-sub-container')) {
                        // Do nothing
                    } else {
                        row = row.filter(function () {
                            return $(this).parents('.keditor-container').length === 1;
                        });
                    }

                    // Set background color with value of textbox
                    // row.css('background-color', this.value);
                    container.css('background-color', this.value);
                });
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
</script>
@endsection
