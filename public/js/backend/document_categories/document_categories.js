$(document).ready(function() {
    $('#categories').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 4 ] },
            { type: 'date-eu', targets: [ 2, 3 ] }
	]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены?') ) {
            return false;
        }        
    });
});