const quailTable = $('#quail-table');
const api = '/func/quail/';

const addQuailForm = $('#add-quail-form');
const addQuailSubmitBtn = addQuailForm.find('button[type="submit"]');
const addQuailModal = $('#add-quail-modal');

$(function () {
    const quailDataTable = quailTable.DataTable({
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
                'data': 'quantity'
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

    addQuailForm.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: api + 'add',
            type: 'POST',
            data: addQuailForm.serialize(),
            dataType: 'JSON',
            success: function (res) {
                resetForm(addQuailForm);
                reloadDataTable(quailTable);
                hideModal(addQuailModal);
            },
            error: function (err) {
                const errJSON = err.responseJSON;
                const Validation = new RegistrationValidation();

                if(errJSON.errors) {
                    const errors = errJSON.errors;

                    $.each(errors, function (field, message) {
                        const input = formInput(addQuailForm, 'input', field);
                        Validation.validate(input, message);
                    });
                }
            },
            beforeSend: function () {
                removeInputValidationErrors();
                submitBtnBeforeSend(addQuailSubmitBtn, 'Adding');
            },
            complete: function () {
                submitBtnAfterSend(addQuailSubmitBtn, 'Add')
            }
        });
    });
});

$(document).on('click', '#addQuailBtn', function () {
    const data = $(this).data();

    addQuailForm.find('input[name="room_no"]').val(data.room_no);
    addQuailForm.find('input[name="current_stock"]').val(data.quantity);
    addQuailForm.find('input[name="id"]').val(data.id);

    showModal(addQuailModal);
});
