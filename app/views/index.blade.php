@extends("_master")

@section("title")
Welcome	
@stop

@section("navigation")
		<li> Welcome Page </li>
		<li> <a href="/destination">Manage Destinations</a> </li>
		<li> <a href="/trip">Manage Trips</a> </li>
		<li> <a href="/poll">Voting</a> </li>
@stop

@section("content")
<p>
Welcome to Buddy Planner. We hope to make planning your group trip a seamless experience. 
</p>
<p>
	Click the links on the side to view your trips or destinations. You can also add more or edit the current ones there too.
	Dont't forget to vote for your trip.
</p>
<p>
	Couple things to keep in mind. When adding destinations, if the name and airport code both match an existing destination, you'll just be editing the old destination.
	Also, because the polls are linked to the trips, you cant edit trips. You'd have to add a different trip, and delete the old one if necessary.
</p>
<p>
	Happy Travels!!
</p>
@stop