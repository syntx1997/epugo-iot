const historyTable = $('#historyTable');

$(function () {
    const historyDataTable = historyTable.DataTable({
        'ajax': '/func/history/get-all',
        'columns': [
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'date'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'temperature'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'decibel'
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'eggsCollected'
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
