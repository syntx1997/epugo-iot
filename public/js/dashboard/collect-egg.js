const eggTable = $('#egg-table');

$(function () {
    const eggDataTable = eggTable.DataTable({
        'ajax': '/func/egg/get-all',
        'columns': [
            {
                'className': 'text-center',
                'orderable': 'false',
                'data': 'id'
            },
            {
                'className': 'text-center',
                'orderable': 'false',
                'data': 'date'
            },
            {
                'className': 'text-center',
                'orderable': 'false',
                'data': 'total'
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
