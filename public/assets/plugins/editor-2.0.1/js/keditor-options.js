KEditor.components['card'] = {
    init: function (contentArea, container, component, keditor) {
        let componentContent = component.find('.keditor-component-content');

        if (componentContent.find('.card').length === 0) {
            componentContent.wrapInner('<div class="card"></div>');
        }

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
            '       <div class="col-sm-12">' +
            '           <label class="small">Background Color</label>' +
            '           <input type="color" class="form-control form-control-sm bg-color" id="bg-color" value="#fffff">' +
            '       </div>' +
            '   </div>' +
            '   <p class="border-bottom">Card Title</p>' +
            '   <div class="form-group">' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Title Text</label>' +
            '           <input type="text" class="form-control form-control-sm input-text" id="cd_tt" value="Card title" data-target="card-title">' +
            '       </div>' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Title Alignment</label>' +
            '           <select class="form-control form-control-sm" data-target="card-title" id="cd_ta">' +
            '               <option value="text-left">Left</option>' +
            '               <option value="text-center">Center</option>' +
            '               <option value="text-right">Right</option>' +
            '               <option value="text-justify">Justify</option>' +
            '           </select>' +
            '       </div>' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Title Color</label><br/>' +
            '           <input type="color" class="form-control form-control-sm fg-color " id="cd_tc"  data-target="card-title">' +
            '       </div>' +
            '   </div>' +
            '   <p class="border-bottom">Card Description</p>' +
            '   <div class="form-group">' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Description Text</label>' +
            '           <textarea class="form-control form-control-sm input-text"  data-target="card-text" id="cd_dt">Some quick example text to build on the card title</textarea>' +
            '       </div>' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Description Alignment</label>' +
            '           <select class="form-control form-control-sm" id="cd_alignment" data-target="card-text" id="cd_da">' +
            '               <option value="text-left">Left</option>' +
            '               <option value="text-center">Center</option>' +
            '               <option value="text-right">Right</option>' +
            '               <option value="text-justify">Justify</option>' +
            '           </select>' +
            '       </div>' +
            '       <div class="col-sm-12">' +
            '           <label class="small">Description Color</label><br/>' +
            '           <input type="color" class="form-control form-control-sm fg-color" id="cd_dc"  data-target="card-text">' +
            '       </div>' +
            '   </div>' +
            '</form>'
        );

        form.find('.bg-color').change(function (event) {
            let component = keditor.getSettingComponent().find('.card');
            component.css('background-color', event.target.value);
        });
        form.find('.input-text').keyup(function () {
            let target = this.dataset.target;
            let component = keditor.getSettingComponent().find('.' + target);
            component[0].innerHTML = this.value;
        });
        form.find('select').change(function (event) {
            let target = this.dataset.target;
            let component = keditor.getSettingComponent().find('.' + target);
            component[0].classList.remove(component[0].dataset.class_name);
            component[0].classList.add(event.target.value);
            component[0].setAttribute('data-class_name', event.target.value);

        });
        form.find('.fg-color').change(function (event) {
            let target = this.dataset.target;
            let component = keditor.getSettingComponent().find('.' + target);
            component.css('color', event.target.value);
        });

    }, showSettingForm: function (form, component, keditor) {
        let card = component.find('.card');
        let card_title = component.find('.card-title');
        let card_description = component.find('.card-text');

        let cd_style = window.getComputedStyle(card[0]);
        form.find("#bg-color").value = cd_style.getPropertyValue('background-color');
        form.find("#cd_tt").value = card_title[0].innerHTML;
        form.find("#cd_ta").value = card_title[0].dataset.hasOwnProperty('class_name') ? card_title.dataset.class_name : 'text-left';
        form.find("#cd_tc").value = card_title.css('color');

    }
};
