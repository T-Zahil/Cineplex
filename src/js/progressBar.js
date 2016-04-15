



var timer1 = setInterval(function(){

	if(timestamp_arrived>=timestamp_stop)
	{
		cursor.style.width=parseInt(button.offsetWidth)+'px';
		

	}
	else if (timestamp_arrived>=timestamp_start)
	{
		time= timestamp_start -  timestamp_arrived;
		time_in_minute=time/60;
		clearInterval(timer1);
		start=true;
		timer.innerHTML='';
	}

	else
	{		
		timestamp_arrived++;
		var last = timestamp_start -  timestamp_arrived;
		var h = parseInt(last/3600);
		var m = parseInt((last-(h*3600))/60);
		var s = parseInt((last-(h*3600)-(m*60)));
		var heure='';
		if (h<10)
		{
			heure +='0'+h+':';
		}			
		else
		{
			heure += h+':';
		}

		if (m<10)
		{
			heure +='0'+m+':';
		}			
		else
		{
			heure += m+':';
		}

		if (s<10)
		{
			heure +='0'+s;
		}			
		else
		{
			heure += s;
		}
			 
		timer.innerHTML= 'commence dans '+heure; 
				
	}

},1000);


var timer2 = setInterval(function(){


	if(timestamp_arrived>=timestamp_stop)
	{
		clearInterval(timer2);
		timer.innerHTML='Votre film est fini';
		start=false;

	}
	else if (timestamp_arrived<=timestamp_stop && timestamp_arrived>=timestamp_start)
	{
		timestamp_arrived++;
		cursor.style.width=(timestamp_arrived-timestamp_start)/time_in_seconds*100+'%';
		
		var last = - timestamp_start + timestamp_arrived;
		var h = parseInt(last/3600);
		var m = parseInt((last-(h*3600))/60);
		var s = parseInt((last-(h*3600)-(m*60)));
		var heure='';
		if (h<10)
		{
			heure +='0'+h+':';
		}			
		else
		{
			heure += h+':';
		}

		if (m<10)
		{
			heure +='0'+m+':';
		}			
		else
		{
			heure += m+':';
		}

		if (s<10)
		{
			heure +='0'+s;
		}			
		else
		{
			heure += s;
		}
			 
		timer.innerHTML= heure; 


	}

}, 1000);


var timer3 = setInterval(function(){

	getData();
}, 1000)






