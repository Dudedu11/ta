<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title>full-mini-calendar : by @thatericsmith</title>
<link rel='stylesheet' type='text/css' href='css/full-mini-calendar.css' />
<script type='text/javascript' src='js/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='js/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='js/full-mini-calendar.js'></script>
<script type='text/javascript'>

	$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		$('#calendar').fullCalendar({
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 1)
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-2)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d-3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+4, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Click for Google',
					start: new Date(y, m, 28),
					end: new Date(y, m, 29),
					url: 'http://google.com/'
				}
			]
		});
		
	});

</script>
<style>
body{  font-family: 'Helvetica Neue',Helvetica, Arial, sans-serif; text-align:center;}
#calendar {width:239px;margin:40px auto;}
#credits {width:500px; margin:0 auto; color:#acacac;}
#credits a {color:#D05154;}
</style>
</head>
<body>
<h1>full-mini-calendar example</h1>
<div id='calendar'></div>

<div id="credits">
<a title="stick a fork in my github" href="https://github.com/thatericsmith/full-mini-calendar">full-mini-calendar</a> is a combo of FullCalendar and mini_calendar<br />
<br /><br />
This is simply a combo of great work done by others<br />
I'm not trying to steal anyone's work!<br />
<br /><br />
So, full credit goes to: <br />
FullCalendar: <a href="http://arshaw.com/">http://arshaw.com/</a><br />
mini_calendar: <a href="http://mariouher.com/">http://mariouher.com/</a><br />
<br /><br />
Thanks so much for making those great scripts, guys!
<br /><br />
<a href="http://thatericsmith.com">@thatericsmith</a>
</div>
</body>
</html>