<h1>Dashboard</h1>
 
<p>Welcome to your Super Admin Dashboard</p>

<p>User Type: {{ Session::get('type'); }} </p>

<a href="{{ URL::to('users/register') }}">Add New User</a>
<br><br>
<a href="{{ URL::to('user') }}">Edit a User</a>	
<br><br>
<a href="{{ URL::to('permissions') }}">Edit Permissions</a>	
<br><br>
<a href="{{ URL::to('orders/new') }}">New Jobs ({{ count($newJobs) }})</a>	
