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
            },
            {
                'className': 'text-center',
                'orderable': false,
                'data': 'status'
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

});