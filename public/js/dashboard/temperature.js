const temperatureTable = $('#temperature-table');

$(function (){

    const temperatureDataTable = temperatureTable.DataTable({
        'ajax': '/api/temperature/get-all',
        'columns': [
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'datetime'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'temperature'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'status'
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
    reloadDataTable(temperatureTable);
});
