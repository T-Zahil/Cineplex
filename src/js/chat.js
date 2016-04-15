    setInterval(function()
    {
    $("#chat_aff").load("../app/controller/chatControl.php",function(){});   
    },1000);
     
 
    $("#submit").click(function()
    {

    //get the user's name
    var name =  $("#titre").html();
     
    //get the message
    var message = $("#message").val();
     
    //empty the message input
    $("#message").val("");

    //scroll on the bottom of the chat
    $("#chat_aff").animate({ scrollTop: $('#chat_aff').prop("scrollHeight")}, 1000);
     
    //send data to chatControl.php
    $.ajax({
        async: false ,
        type: 'GET',
        url: '../app/controller/chatControl.php?name='+name+'&message='+message
    });
     
    });

     $("body").on( "keydown", function(event) {
      if(event.which == 13) 
      {

        //get the user's name
        var name =  $("#titre").html();
         
        //get the message
        var message = $("#message").val();
         
        //empty the message input
        $("#message").val("");

        //scroll on the bottom of the chat
        $("#chat_aff").animate({ scrollTop: $('#chat_aff').prop("scrollHeight")}, 1000);
        
        //send data to chatControl.php
        $.ajax({
            async: false ,
            type: 'GET',
            url: '../app/controller/chatControl.php?name='+name+'&message='+message
             
        });
      }
     
    });

// LOADER
window.setTimeout(function(){
	$(".loader").fadeOut("slow","swing");
	window.setTimeout(function(){
	$(".loader").remove();
	},500);
},1500);