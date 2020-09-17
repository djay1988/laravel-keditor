KEditor.components['card'] = {
    init: function (contentArea, container, component, keditor) {
        let iframe = component.find('iframe');
        let wrapper = iframe.parent();
        keditor.initIframeCover(iframe, wrapper);
    },

    settingEnabled: true,

    settingTitle: 'Card Settings',

    initSettingForm: function (form, keditor) {
        form.append(
            '<form class="form-horizontal">' +
            '   <div class="form-group">' +
            '       <div class="col-sm-12">' +
            '           <button type="button" class="btn btn-block btn-primary btn-card-edit">Change Image</button>' +
            '       </div>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <label class="col-sm-12">Aspect Ratio</label>' +
            '       <div class="col-sm-12">' +
            '           <button type="button" class="btn btn-sm btn-default btn-youtube-169">16:9</button>' +
            '           <button type="button" class="btn btn-sm btn-default btn-youtube-43">4:3</button>' +
            '       </div>' +
            '   </div>' +
            '</form>'
        );



        // let btnEdit = form.find('.btn-youtube-edit');
        //
        //
        // let btn169 = form.find('.btn-youtube-169');
        // btn169.on('click', function (e) {
        //     e.preventDefault();
        //     keditor.getSettingComponent().find('.embed-responsive').removeClass('embed-responsive-4by3').addClass('embed-responsive-16by9');
        // });

    },
};
