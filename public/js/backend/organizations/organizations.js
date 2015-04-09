$(document).ready(function() {
    $('#organizations').DataTable({
        language: {
            url: "assets/packages/datatables/media/js/ru.json"
        },
        stateSave: true,
        responsive: true,
        aoColumnDefs: [
            { bSortable: false, aTargets: [ 5 ] },
            { type: 'date-eu', targets: [ 3, 4 ] }
	]
    });
    
    // Подтверждение удаления
    $('.delete').on('click', function(){
        if ( !confirm('Вы уверены? При удалении ведомства также удалятся услуги, ему принадлежащие.') ) {
            return false;
        }        
    });
});