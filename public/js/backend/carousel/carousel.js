$(document).ready(function() {
    $('#carousel').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 2, 7 ] },
            { type: 'date-eu', targets: [ 5, 6 ] }
	],
        "order": [[ 2, "asc" ]]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены?') ) {
            return false;
        }        
    });
});