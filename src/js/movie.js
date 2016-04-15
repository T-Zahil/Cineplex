var movieID,
    movieType,
    type;

//ajax request to display the list of rooms
$.ajax({
    url: "http://92.222.195.29/Cineplex/app/model/movieModel.php",
    type: "POST",
    data: {},
    success: function(data, status, xhr) {
        $(".list-rooms").prepend(data);

        for (var i = 1; i < ($('.number').length) + 1; i++) {

            movieID = $('.movie-' + i).children(".hidden").html();
            movieType = $('.movie-' + i).children(".genre").children().html();

            if (movieType == 'série') {
                type = 'tv';
            } else {
                type = 'movie';
            }
            //call the function to append the pictures
            getMovieOnRooms(movieID, i, type);

        }
    },
    error: function(jqXHR, status, errorThrown) {
        $(".list-rooms").prepend('Erreur de la base de données, veuillez réessayer');
    }
});

function getMovieOnRooms(movieId, movieNum, movieType) {

    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getMovieRoom.php",
        type: "POST",
        data: {
            'movieId': movieId,
            'movieType': movieType
        },
        dataType: "json",
        success: function(data, status, xhr) {
            //append the movie pictures
            $('.movie-' + movieNum).find('.picture').append(data['backdrop']);
        },
        error: function(jqXHR, status, errorThrown) {
            console.log("error");
        }
    });

}

//ajax request to display the list of movie, on the top of the page
$.ajax({
    url: "http://92.222.195.29/Cineplex/app/model/currentMoviesModel.php",
    type: "POST",
    data: {},
    success: function(data, status, xhr) {

        $(".movies").prepend(data);

        for (var i = 1; i < 7; i++) {

            movieID = $('.moviePoster-' + i).attr('movieid');
            movieType = $('.moviePoster-' + i).attr('movietype');

            if (movieType == 'série') {
                type = 'tv';
            } else {
                type = 'movie';
            }
            //call the function to append the pictures
            getMovieForPosters(movieID, i, type);

        }
    },
    error: function(jqXHR, status, errorThrown) {
        console.log('error');
    }
});


function getMovieForPosters(movieId, movieNum, movieType) {

    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getMovieRoom.php",
        type: "POST",
        data: {
            'movieId': movieId,
            'movieType': movieType
        },
        dataType: "json",
        success: function(data, status, xhr) {
            $('.moviePoster-' + movieNum).append(data['poster']);
        },
        error: function(jqXHR, status, errorThrown) {
            console.log("error");
        }
    });

}


// Get a list of movies corresponding to a research, on click
$(".submitResearch").on('click', function() {
    var val = $('.movieResearch').val();
    getResearch(val);
});


//function to do the research
function getResearch(request) {
    // Get movie informations
    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getResearch.php",
        type: "POST",
        data: {
            'request': request
        },
        dataType: 'json',
        success: function(data, status, xhr) {
            $('.results').empty();
            for (var i = 0; i < 5; i++) {

                var title = data[i]['title'].replace(' ', '+');
                title = title.replace(' ', '+');
                $('.results').append("<span idMovie=" + data[i]['id'] + " typeMovie=" + data[i]['mediaType'] + " value=" + title + " class='result-movie'>" + data[i]['title'] + "</span><span>(" + data[i]['release'] + ")</span><br>");

            }
            $('.right').css({
                'display': 'inline-block'
            });
        },
        error: function(jqXHR, status, errorThrown) {
            $('.results').append('Pas de films trouvés');
        }
    });
}

// When the movie is choosed
$(".results").on('click', '.result-movie', function(e) {
    e.preventDefault();

    $('.create-rooms .research, .create-rooms .right').remove();
    $('.getmovie').removeClass('hide');
    $('.getmovie').append("<p class='input-container submit'><input type='submit' class='new-room' idMovie=" + $(this).attr('idMovie') + " typeMovie=" + $(this).attr('typeMovie') + " name='roomcreation' value='CREER LA SALLE'></p>");
    
    var title = $(this).attr('value');

    title = title.replace('+', ' ');
    title = title.replace('+', ' ');
    title = title.replace('+', ' ');

    $('.movieSelected').attr('value', title);

});

var movieVar = true;

// Have more informations on a movie
$('.movies').on('click', '.moviePoster', function() {
    getMovieOnHome(this);
});

function getMovieOnHome(movieEl) {

    var movieId = $(movieEl).attr('movieid'),
        movieType = $(movieEl).attr('movietype');

    // Get movie informations
    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getMovie.php",
        type: "POST",
        data: {
            'movieId': movieId,
            'movieType': movieType
        },
        dataType: "json",
        success: function(data, status, xhr) {
            var focus = $('.focus-movie');

            $(focus).find('.genres').empty();
            $(focus).find('.genres').append(data['genres']);

            $(focus).find('.title').empty();
            $(focus).find('.title').append(data['title']);

            $(focus).find('.actors').empty();
            $(focus).find('.actors').append(data['release'] + ' - ' + data['cast']);

            $(focus).find('.poster').empty();
            $(focus).find('.poster').append(data['poster']);

            data['overview'] = data['overview'].substr(0, 600) + '...';

            $(focus).find('.synopsis p').empty();
            $(focus).find('.synopsis p').append(data['overview']);

            var url = data['backdrop'];

            url = url.substring(10);
            url = url.substr(0, url.length - 3);

            $(focus).find('.background_movie').css({
                'background-image': 'url(' + url + ')'
            });

            $(focus).find('.radial-score').html(data['note'] + '/10');
            displayScore();
        },
        error: function(jqXHR, status, errorThrown) {
            $('.focus-movie').append('Pas de données trouvées pour ce film');
        }
    });

}

getDbOnChat();
// call DB for primary informations in order to call API after with getMovieOnChat
function getDbOnChat() {

    if ($('body').hasClass('homepage')) {
        return false;
    }
    //get id 
    var id = $('.room-num').html();
    id = id.substr(18, 1);

    var movieId = '';
    movieType = '';

    // get chat movie information in db
    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getRoom.php",
        type: "POST",
        data: {
            'id': id
        },
        dataType: "json",
        success: function(data, status, xhr) {
            movieId = data[0]['idMovie'];
            movieType = data[0]['type'];
            getMovieOnChat(movieId, movieType)
        },
        error: function(jqXHR, status, errorThrown) {
            console.log('error');
        }
    });

}

// call API
function getMovieOnChat(movieId, movieType) {
    //Get movie informations
    $.ajax({
        url: "http://92.222.195.29/Cineplex/app/controller/getMovie.php",
        type: "POST",
        data: {
            'movieId': movieId,
            'movieType': movieType
        },
        dataType: "json",
        success: function(data, status, xhr) {
            var filmInfo = $('.film-info');

            $(filmInfo).find('.poster').append(data['poster']);

            $('.room-movie').append(data['title']);

            $(filmInfo).find('h3.title').append(data['title']);

            $(filmInfo).find('p.actors').append(data['release'] + ' - ' + data['cast']);
            
            $(filmInfo).find('p.synopsis').append(data['overview']);
        },
        error: function(jqXHR, status, errorThrown) {
            console.log('error');
        }
    });
}

$('.list-rooms').on('click', '*', function() {

    var room = $(this).find('.number').html();

    //redirect to the room clicked
    window.location.href = "../messenger?room=" + room;

});