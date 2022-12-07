const soundTable = $('#sound-table');

$(function (){

    const soundDataTable = soundTable.DataTable({
        'ajax': '/api/sound/get-all',
        'columns': [
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'datetime'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'decibel'
            }
        ],
        searching: true,
        paging:true,
        select: false,
        info: true,
        lengthChange:false ,
        language: {
            paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
            }
        },
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    });

});

$(document).on('click', '#refreshTableBtn', function () {
    reloadDataTable(soundTable);
});
