Hello <i>{{ $demo->receiver }}</i>,

	<p></p>

	 
	<div>
	<p>{{ $demo->sub1 }}</p>
	<p>{{ $demo->sub2 }}</p>
	</div>
	 

	<div>

	
	<p><span>Link : </span> <a href="{{ $demo->APP_ROUTE_URL }}" target="_blank">{{ $demo->APP_ROUTE_URL }}</a></p>
	<p>{{ $demo->Email }}</p>
	
	<p>{{ $demo->Password }}</p>

	
	</div>
	 
	 

	 
	Thank You,
	<br/>
	<i>{{ $demo->sender }}</i>
