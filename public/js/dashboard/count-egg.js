const eggTable = $('#egg-table');
const api = '/func/egg/';

const setTotalEggForm = $('#set-total-egg-form');
const setTotalEggSubmitBtn = setTotalEggForm.find('button[type="submit"]');
const setTotalEggModal = $('#set-total-egg-modal');

$(function () {

    const eggDataTable = eggTable.DataTable({
        'ajax': api + 'get-all',
        'columns': [
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'id'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'room_no'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'total'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'actions'
            }
        ],
        searching: false,
        paging:true,
        select: false,
        info: true,
        lengthChange:false ,
        language: {
            paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
            }
        }
    });

    setTotalEggForm.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: api + 'set',
            type: 'POST',
            data: setTotalEggForm.serialize(),
            dataType: 'JSON',
            success: function (res) {
                resetForm(setTotalEggForm);
                hideModal(setTotalEggModal);
                reloadDataTable(eggTable);
            },
            error: function (err) {
                const errJSON = err.responseJSON;
                const Validation = new RegistrationValidation();

                if(errJSON.errors) {
                    const errors = errJSON.errors;

                    $.each(errors, function (field, message) {
                        const input = formInput(setTotalEggForm, 'input', field);
                        Validation.validate(input, message);
                    });
                }
            },
            beforeSend: function () {
                removeInputValidationErrors();
                submitBtnBeforeSend(setTotalEggSubmitBtn, 'Setting');
            },
            complete: function () {
                submitBtnAfterSend(setTotalEggSubmitBtn, 'Set');
            }
        });
    });

});

$(document).on('click', '#setTotalEggBtn', function () {
    const data = $(this).data();

    setTotalEggForm.find('input[name="room_no"]').val(data.room_no);
    setTotalEggForm.find('input[name="current_total"]').val(data.total);
    setTotalEggForm.find('input[name="id"]').val(data.id);

    showModal(setTotalEggModal);
});
