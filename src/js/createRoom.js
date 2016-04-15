$('.getmovie').on('click','.new-room',function(){

    var getMovie  = $('.getmovie'),
        movie     = $(getMovie).find('.movieSelected').val(),
        channel   = $(getMovie).find('.channel input').val(),
        hourStart = $(getMovie).find('.hour-start input').val(),
        minStart  = $(getMovie).find('.min-start input').val(),
        hourEnd   = $(getMovie).find('.hour-end input').val(),
        minEnd    = $(getMovie).find('.min-end input').val(),
        idMovie   = $(this).attr('idmovie'),
        typeMovie = $(this).attr('typemovie');

        console.log(channel);
    
    $.ajax({
        url      : "http://92.222.195.29/Cineplex/app/controller/createRoom.php",
        type     : "POST",
        data     : {'movie':movie, 'channel':channel, 'hourStart':hourStart, 'minStart':minStart, 'hourEnd':hourEnd, 'minEnd':minEnd, 'idMovie':idMovie, 'typeMovie':typeMovie},
        // dataType : "json",
        success : function(data, status, xhr) {
            window.location.assign("http://92.222.195.29/Cineplex/messenger/?room="+(parseInt(data-1)));
        },
        error: function (jqXHR, status, errorThrown) {
            console.log('error');
        }
    });
})