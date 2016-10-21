$(function(){
    $(document).on('click', '.fc-day', function(){
        var date=$(this).attr("data-date");
        $.get('index.php?r=event/create',{'date':date}, function(data){
            $('#modalEvent').modal('show')
            .find('#modalContentEvent')
            .html(data);
        });
        
    });

    $('#modalButton').click(function(){
        $('#modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});