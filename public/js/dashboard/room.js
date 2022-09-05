const roomTable = $('#room-table');
const api = '/func/room/';

const addRoomForm = $('#add-room-form');
const addRoomSubmitBtn = addRoomForm.find('button[type="submit"]');
const addRoomModal = $('#add-room-modal');

const editRoomForm = $('#edit-room-form');
const editRoomSubmitBtn = editRoomForm.find('button[type="submit"]');
const editRoomModal = $('#edit-room-modal');

const addRoomBtn = $('#addRoomBtn');

$(function () {
    const roomDataTable = roomTable.DataTable({
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

    addRoomBtn.on('click', function () {
        $.ajax({
            url: api + 'generate-room-no',
            type: 'GET',
            dataType: 'JSON',
            success: function (res) {
                addRoomForm.find('input[name="room_no"]').val(res.room_no);
            }
        })
    });

    addRoomForm.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: api + 'add',
            type: 'POST',
            data: addRoomForm.serialize(),
            dataType: 'JSON',
            success: function (res) {
                Swal.fire('Success', res.message, 'success');
                hideModal(addRoomModal);
                reloadDataTable(roomTable);
            },
            error: function (err) {
                const errJSON = err.responseJSON;
            },
            beforeSend: function () {
                removeInputValidationErrors();
                submitBtnBeforeSend(addRoomSubmitBtn, 'Adding');
            },
            complete: function () {
                submitBtnAfterSend(addRoomSubmitBtn, 'Add');
            }
        });
    });

    editRoomForm.on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: api + 'edit',
            type: 'POST',
            data: editRoomForm.serialize(),
            dataType: 'JSON',
            success: function (res) {
                Swal.fire('Success', res.message, 'success');
                hideModal(editRoomModal);
                reloadDataTable(roomTable);
            },
            error: function (err) {
                const errJSON = err.responseJSON;
                const Validation = new RegistrationValidation();

                if(errJSON.errors) {
                    const errors = errJSON.errors;

                    $.each(errors, function (field, message) {
                        const input = formInput(editRoomForm, 'input', field);
                        Validation.validate(input, message);
                    });
                }
            },
            beforeSend: function () {
                removeInputValidationErrors();
                submitBtnBeforeSend(editRoomSubmitBtn, 'Editing');
            },
            complete: function () {
                submitBtnAfterSend(editRoomSubmitBtn, 'Edit');
            }
        });
    });
});

$(document).on('click', '#editRoomBtn', function () {
    const data = $(this).data();

    editRoomForm.find('input[name="room_no"]').val(data.room_no);
    editRoomForm.find('input[name="id"]').val(data.id);

    showModal(editRoomModal);
});
