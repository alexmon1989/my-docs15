$(document).ready(function() {
    $('#global-categories').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 5 ] },
            { type: 'date-eu', targets: [ 4, 5 ] }
	]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены? Все подкатегории и статьи также будут удалены.') ) {
            return false;
        }        
    });
});