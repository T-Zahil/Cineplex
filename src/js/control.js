
// getting data
var data = jQuery.parseJSON(returnResult().responseText)

// set variables with data
var movie_name =data.movieName;
var id_room = parseInt(data.idroom);
var timestamp_start = parseInt(data.startTime);
var timestamp_stop = parseInt(data.stopTime);

// getting the elements
var infos= document.querySelector('.chat-infos');
var timeline = document.querySelector('.timeline');
var button = document.querySelector('.hype');
var cursor = document.querySelector('.cursor');
var timer = infos.querySelector('.movie-time');
var reactions = infos.querySelector('.reacts');

// Calculation of some time variables
var timestamp_arrived = Math.round(new Date().getTime() / 1000);
var date = new Date;
var start=false;

var time=1;
var time_in_seconds=timestamp_stop-timestamp_start;
var time_in_minutes=Math.ceil(time_in_seconds/60);
var progression =  button.offsetWidth/time_in_seconds;


// Update database onclick 
function hype()
{

	var time = -timestamp_stop+timestamp_arrived+time_in_seconds;
	var h = parseInt(time/3600);
	var m = parseInt((time-(h*3600))/60);
	var s = parseInt((time-(h*3600)-(m*60)));	
	var time_in_minutes = time_in_seconds/60;
	

	if (window.XMLHttpRequest)
	{
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	   var xmlhttp=new XMLHttpRequest();
	} 

	 else 
	{ // code for IE6, IE5
	    document.write('Pour votre bien : <a href="https://support.google.com/chrome/answer/95346?hl=en">Cliquez ici</a>')
	}


	xmlhttp.open("GET","../app/controller/sendEmotion.php?h="+h+"&id="+id_room+"&m="+m+"&s="+s+"&movie="+movie_name+"&totalSec="+time_in_seconds+"&positionSec="+time,true);
	xmlhttp.send();
	  


}


// Display the hype result
function display(data,time)
{	


	reactions.innerHTML='';
	var total=0;
	timeline.querySelector('.results').innerHTML='';
	

	 for (var i = 0; i < data.length; i++)
		{
			e = timeline.querySelector('.results');
			newDiv = document.createElement("div");
			newDiv.className='hypeBar';
			newDiv.style.height=timeline.offsetHeight/25*data[i].nbHype+5+'px';
			newDiv.style.width=e.offsetWidth/time+'px';
			newDiv.style.marginLeft=(data[i].time_position/time)*button.offsetWidth+'px';
			newDiv.style.transform='translateY('+(timeline.offsetHeight-parseInt(newDiv.style.height))+'px)';
			e.appendChild(newDiv);	

			if (start==true)
			{
				total += parseInt(data[i].nbHype);				

			}
		}

		if (start==true)
		{
			reactions.innerHTML+= total+" réactions enregistrées";

		}
		
}

// Getting the data related to the hype result
function getData()
{
	if (window.XMLHttpRequest)
	{
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	} 

	 else 
	{ // code for IE6, IE5
	    document.write('Pour votre bien : <a href="https://support.google.com/chrome/answer/95346?hl=en">Cliquez ici</a>')
	}



	xmlhttp.onreadystatechange=function() {

	    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
	    {	    	
		   	 var result=xmlhttp.responseText;		   	 
		     var data=jQuery.parseJSON(result);
		     display(data,time_in_seconds);
	    }

	    
	  }
	  xmlhttp.open("GET","../app/controller/getData.php?id="+id_room,true);
	  xmlhttp.send();	  
}


function returnResult() {
  return $.ajax({
    url : '../app/controller/setRoom.php', 
       type : 'GET' ,
       data : 'page='+ room, 
       datatype : 'json',
       async: false,

       success : function(data, statut){

       	
           
       },           
  });
}


  



getData();
