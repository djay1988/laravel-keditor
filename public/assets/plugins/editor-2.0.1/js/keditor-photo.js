KEditor.components['photo'] = {
    init: function (contentArea, container, component, keditor) {
        let componentContent = component.children('.keditor-component-content');
        let img = componentContent.find('img');

        img.css('display', 'inline-block');
    },

    settingEnabled: true,

    settingTitle: 'Photo Settings',

    initSettingForm: function (form, keditor) {
        let self = this;
        let options = keditor.options;

        form.append(
            '<form class="form-horizontal">' +
            '   <div class="form-group">' +
            '       <div class="col-sm-12">' +
            '           <button type="button" class="btn btn-block btn-primary" id="photo-edit">Change Photo</button>' +
            '           <input type="file" style="display: none" />' +
            '       </div>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <label for="photo-align" class="col-sm-12">Align</label>' +
            '       <div class="col-sm-12">' +
            '           <select id="photo-align" class="form-control">' +
            '               <option value="text-left">Left</option>' +
            '               <option value="text-center">Center</option>' +
            '               <option value="text-right">Right</option>' +
            '           </select>' +
            '       </div>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <label for="photo-style" class="col-sm-12">Style</label>' +
            '       <div class="col-sm-12">' +
            '           <select id="photo-style" class="form-control">' +
            '               <option value="">None</option>' +
            '               <option value="rounded">Rounded</option>' +
            '               <option value="img-thumbnail">Thumbnail</option>' +
            '           </select>' +
            '       </div>' +
            '   </div>' +
            '   <div class="form-group">' +
            '       <div class="form-check" style="margin-left: 15px;+">' +
            '           <input class="form-check-input" type="checkbox" name="exampleRadios" id="photo-fit-to-width" />' +
            '           <label class="form-check-label" for="photo-fit-to-width">' +
            '           Fit to Width</label>' +
            '       </div>' +
            '   </div>' +

            '</form>'
        );

        let photoEdit = form.find('#photo-edit');
        let fileInput = photoEdit.next();
        photoEdit.on('click', function (e) {
            e.preventDefault();

            fileInput.trigger('click');
        });
        fileInput.on('change', function () {
            let file = this.files[0];
            if (/image/.test(file.type)) {
                let reader = new FileReader();
                let img = keditor.getSettingComponent().find('img');

                photoEdit[0].classList.add('disabled');
                photoEdit[0].innerHTML = 'Uploading...';
                const fileInput = document.querySelector('#your-file-input');
                const formData = new FormData();

                formData.append('image-file', file);
                formData.append('folder', 'keditor');
                formData.append("_token", $("meta[name='csrf-token']").attr('content'));

                const options = {
                    method: 'POST',
                    body: formData
                };

                fetch('/laravel-keditor/public/pages/upload', options).then((response) => response.json())
                    .then((data) => {
                        img.attr('src', data.url);
                        photoEdit[0].classList.remove('disabled');
                        photoEdit[0].innerHTML = 'Change Photo';
                    })
                    .catch(error => {
                        photoEdit[0].classList.remove('disabled');
                        photoEdit[0].innerHTML = 'Change Photo';
                        console.log(error);
                    });
            } else {
                alert('Your selected file is not photo!');
            }
        });

        let inputAlign = form.find('#photo-align');
        inputAlign.on('change', function () {
            let panel = keditor.getSettingComponent().find('.photo-panel');
            img.removeClass('text-left text-center text-right');
            panel.classList.add(this.value);
        });

        let inputfit = form.find('#photo-fit-to-width');
        inputfit.on('click', function () {
            let img = keditor.getSettingComponent().find('img');
            if(this.checked){
                img.attr({'width':'100%'});
            }else{
                img.removeAttr('width');
            }
        });

        let cbbStyle = form.find('#photo-style');
        cbbStyle.on('change', function () {
            let img = keditor.getSettingComponent().find('img');
            let val = this.value;

            img.removeClass('rounded img-thumbnail');
            if (val) {
                img.addClass(val);
            }
        });
    },

    showSettingForm: function (form, component, keditor) {
        let self = this;
        let inputAlign = form.find('#photo-align');
        let inputfitToWidth = form.find('#photo-fit-to-width');
        let cbbStyle = form.find('#photo-style');

        let panel = component.find('.photo-panel');
        let img = panel.find('img');

        let algin = panel.css('text-align');
        if (algin !== 'right' || algin !== 'center') {
            algin = 'left';
        }

        if (img.hasClass('img-rounded')) {
            cbbStyle.val('img-rounded');
        } else if (img.hasClass('img-circle')) {
            cbbStyle.val('img-circle');
        } else if (img.hasClass('img-thumbnail')) {
            cbbStyle.val('img-thumbnail');
        } else {
            cbbStyle.val('');
        }

        inputAlign.val(algin);
        inputfitToWidth.prop('checked', img[0].hasAttribute('width'));
    }
};
