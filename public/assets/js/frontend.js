$( document ).ready(function (){
    // Вешаем обработчик события на элемент выбора центра МФЦ
    $( "#mfc-choosing" ).on( "change", function() {
        var id = $( this ).val();        
        $.post('api/change-centre', { id : id }, function(data) {
            if (data.id) {
                location.reload();
            }            
        });
    });
    
    $( "#show-docs" ).on( 'click', function( e ) {
        e.preventDefault();
        $( "#docs" ).toggle('fast');
    } );
    
    $( "#show-videos" ).on( 'click', function( e ) {
        e.preventDefault();
        $( "#videos" ).toggle('fast');
    } );
});