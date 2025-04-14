(function ($) {
    "use strict"

    $('[name=form_type]').on('change', function () {
        let formType = $(this).val();
        let extraFields = formGenerator.extraFields(formType);
        let extraArea = $('.extra_area');

        extraArea.html(extraFields);
        extraArea.find('select').select2({
            containerCssClass: ":all:",
            dropdownParent: $('#formGenerateModal')
        });
    }).change();

    $(document).on('click', '.addOption', function () {
        let html = formGenerator.addOptions();
        $('.options').append(html);
    });

    $(document).on('click', '.removeOption', function () {
        $(this).closest('.input--group').remove();
    });

    $(document).on('click', '.editFormData', function () {
        formGenerator.formEdit($(this));

        $('.extra_area').find('select').select2({
            containerCssClass: ":all:",
            dropdownParent: $('#formGenerateModal')
        });
    });

    $(document).on('click', '.removeFormData', function () {
        $(this).closest('.col-sm-6').remove();
    });

    $('.form-generate-btn').on('click', function () {
        formGenerator.showModal();
    });

    let updateId = formGenerator.totalField;

    $(formGenerator.formClassName).on('submit', function (e) {
        updateId += 1;
        e.preventDefault();

        let form = $(this);
        let formItem = formGenerator.formsToJson(form);
        formGenerator.makeFormHtml(formItem, updateId);
        formGenerator.closeModal();
    });
})(jQuery)
