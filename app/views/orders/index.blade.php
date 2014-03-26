<div class="col-md-12">
	<div class="search">
		{{ Form::model(null, array('url' => array('orders/index'))) }}
		{{ Form::text('query', null, array( 'placeholder' => 'Search query...' )) }}
		{{ Form::submit('Search') }}
		{{ Form::close() }}
	</div>
</div>
<h1>Jobs</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@foreach($orders as $key => $value)
<div class="col-md-6">
	<h4>{{ $value->address }}, {{ $value->postcode }} | {{ $value->epc_status }} | {{ $value->assessor }}</h4>
</div>
<div class="col-md-6">
	<h4 class="text-right"><a class="btn btn-small btn-success" href="{{ URL::to('notes/' . $value->id . '/edit') }}">Notes</a>  <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id . '/invoice') }}">Create Invoice</a> </h4>
</div>
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>Order Date</td>
			<td>Agent</td>
			<td>Order Type</td>
			<td>Net Cost</td>
			<td>EPC Name</td>
			<td>EPC Tel</td>
			<td>EPC Email</td>
			<td>Assessor</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	<div class="content-main">
		<tr>
			<td>{{ $value->order_date }}</td>
			<td>{{ $value->agent }}</td>
			<td>{{ $value->type }}</td>
			<td>{{ $value->net_cost }}</td>
			<td>{{ $value->epc_name }}</td>
			<td>{{ $value->epc_tel }}</td>
			<td>{{ $value->epc_email }}</td>
			<td>{{ $value->assessor }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
				<!-- we will add this later since its a little more complicated than the other two buttons -->

				<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
				<!-- <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a> -->

				<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit') }}">Edit</a>

			</td>
		</tr>
		</div>
	
	</tbody>
</table>
<h4>{{ $value->doc1 }} | {{ $value->doc2 }} | {{ $value->doc3 }} | {{ $value->doc4 }} | {{ $value->doc5 }} </h4>
<hr>
@endforeach