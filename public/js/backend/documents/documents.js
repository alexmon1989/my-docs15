$(document).ready(function() {
    $('#documents').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 7 ] },
            { type: 'date-eu', targets: [ 5, 6 ] }
	]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены?') ) {
            return false;
        }        
    });
});