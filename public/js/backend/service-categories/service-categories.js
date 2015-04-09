$(document).ready(function() {
    $('#service-categories').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 6 ] },
            { type: 'date-eu', targets: [ 5, 6 ] }
	]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены? Все статьи также будут удалены.') ) {
            return false;
        }        
    });
});