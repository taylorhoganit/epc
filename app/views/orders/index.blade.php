
<div class="col-md-12 search">
	{{ Form::model(null, array('route' => array('orders.search'))) }}

	<div class="col-md-4">
		Order Date<br>
		{{ Form::text('search_order_from_date', null, array('class'=>'form-control half', 'placeholder'=>'Order From')) }}
		{{ Form::text('search_order_to_date', null, array('class'=>'form-control half last', 'placeholder'=>'Order To')) }}
	</div>
	<div class="col-md-4">
		Type<br>
		{{ Form::select('search_order_type', array(''=>'Select Order Type', 'Commercial'=>'Commercial', 'Domestic'=>'Domestic', 'On Construction'=>'On Construction', 'SBEM New Build'=>'SBEM New Build'), $selected = NULL,  array('class' => 'form-control')) }}
	</div>
	<div class="col-md-4">
		Order Status<br>
		{{ Form::select('search_order_status', array(''=>'Select EPC Status', 'Quoted'=>'Quoted', 'Instructed - To Schedule'=>'Instructed - To Schedule', 'To Survey'=>'To Survey', 'To Input'=>'To Input', 'Awaiting Payment - Report Produced'=>'Awaiting Payment - Report Produced', 'To Send'=>'To Send', 'Completed'=>'Completed', 'Cancelled'=>'Cancelled', 'On Hold'=>'On Hold'), $selected = NULL,  array('class' => 'form-control')) }}
	</div>
	<div class="col-md-4">
		Agent<br>
		<select name="search_order_agent" class="form-control">
			<option value="">Please Select an Agent</option>
	      @foreach(User::where('type', '=', 'Agent')->get() as $agent)
	        <option value="{{ $agent->firstname }} {{ $agent->lastname }}">{{ $agent->firstname }} {{ $agent->lastname }}</option>
	      @endforeach
	    </select>
	</div>
	<div class="col-md-4">
		Assessor<br>
		<select name="search_order_assessor" class="form-control">
			<option value="">Please Select an Assessor</option>
	     	@foreach(User::where('type', '=', 'Assessor')->get() as $assessor)
	        <option value="{{ $assessor->firstname }} {{ $assessor->lastname }}">{{ $assessor->firstname }} {{ $assessor->lastname }}</option>
	      	@endforeach
	    </select>
	</div>
	<div class="col-md-4">
		Postcode<br>
		{{ Form::text('search_order_postcode', null, array('class'=>'form-control', 'placeholder'=>'Order Postcode')) }}
	</div>
	<div class="clearfix"></div>
	<div class="cod-md-4">
		{{ Form::submit('Search', array('class'=>'btn btn-small btn-success search-btn')) }}
		<a class="btn btn-small btn-info" href="/orders">Reset</a>
		{{ Form::close() }}
	</div>
		
</div>
<h1>Jobs</h1>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
@foreach($orders as $key => $value)
<div class="order">
	<div class="col-md-6">
		<h4>{{ $value->address }}, {{ $value->postcode }} | {{ $value->epc_status }} | {{ $value->assessor }}</h4>
	</div>
	<div class="col-md-6">
		<h4 class="text-right"><a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id . '/invoice') }}">Create Invoice</a> </h4>
	</div>
	<div class="col-md-4">
		<h5>Order Details</h5>
	</div>
	<div class="col-md-8 text-right">
		<h5><span class="table-nav nav-selected" id="order-nav<?php echo $value->id?>" onclick="changeDetails('order', {{ $value->id }});">Order Details</span> | <span class="table-nav" id="invoice-nav<?php echo $value->id?>" onclick="changeDetails('invoice', {{ $value->id }});">Invoice Details</span> | <span class="table-nav" id="assessor-nav<?php echo $value->id?>" onclick="changeDetails('assessor', {{ $value->id }});">Assessor Invoice Details</span> | <span class="table-nav" id="survey-nav<?php echo $value->id?>" onclick="changeDetails('survey', {{ $value->id }});">Survey Appointment Details</span></h5>
	</div>
	<table class="table table-striped table-bordered" id="order<?php echo $value->id?>">
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
				<td class="actions-col">Actions</td>
			</tr>
		</thead>
		<tbody>
		<div class="content-main">
			<tr>
				<td>
					@if ($perms->order_date == true)
						{{ $value->order_date }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->agent == true)
						{{ $value->agent }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->type == true)
						{{ $value->type }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->net_cost == true)
						{{ $value->net_cost }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->epc_name == true)
						{{ $value->epc_name }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->epc_tel == true)
						{{ $value->epc_tel }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->epc_email == true)
						{{ $value->epc_email }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->assessor == true)
						{{ $value->assessor }}
					@else
					    N/A
					@endif
				</td>

				<!-- we will also add show, edit, and delete buttons -->
				<td class="actions-col">

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<!-- <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a> -->

					<a class="btn btn-small btn-success" href="{{ URL::to('notes/' . $value->id . '/edit#collapseOne') }}">Notes</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit#collapseOne') }}">Edit</a>

					{{ Form::open(array('url' => 'orders/' . $value->id, 'class' => 'delete-btn')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
					{{ Form::close() }}

				</td>
			</tr>
			</div>
		</tbody>
	</table>
	<table class="table table-striped table-bordered hidden" id="invoice<?php echo $value->id?>">
		<thead>
			<tr>
				<td>Inv No</td>
				<td>Inv Net</td>
				<td>Inv VAT</td>
				<td>Inv Tot</td>
				<td>Inv Date</td>
				<td>Inv Status</td>
				<td>Inv Name</td>
				<td>Inv Email</td>
				<td>Inv Address</td>
				<td>Due Date</td>
				<td>Paid Date</td>
				<td class="actions-col">Actions</td>
			</tr>
		</thead>
		<tbody>
		<div class="content-main">
			<tr>
				<td>
					@if ($perms->inv_num == true)
						{{ $value->inv_num }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_net == true)
						{{ $value->inv_net }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_vat == true)
						{{ $value->inv_vat }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_tot == true)
						{{ $value->inv_tot }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_date == true)
						{{ $value->inv_date }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_status == true)
						{{ $value->inv_status }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_name == true)
						{{ $value->inv_name }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_email == true)
						{{ $value->inv_email }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_address == true)
						{{ $value->inv_address }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_due_date == true)
						{{ $value->inv_due_date }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->inv_paid_date == true)
						{{ $value->inv_paid_date }}
					@else
					    N/A
					@endif
				</td>

				<!-- we will also add show, edit, and delete buttons -->
				<td class="actions-col">

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<!-- <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a> -->

					<a class="btn btn-small btn-success" href="{{ URL::to('notes/' . $value->id . '/edit#collapseTwo') }}">Notes</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit#collapseTwo') }}">Edit</a>

					{{ Form::open(array('url' => 'orders/' . $value->id, 'class' => 'delete-btn')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
					{{ Form::close() }}

				</td>
			</tr>
			</div>
		</tbody>
	</table>
	<table class="table table-striped table-bordered hidden" id="assessor<?php echo $value->id?>">
		<thead>
			<tr>
				<td>Assessor Invoice Ref</td>
				<td>Assessor Amount</td>
				<td>Assessor VAT</td>
				<td>Assessor Total</td>
				<td>Ass Inv Date</td>
				<td>Ass Inv Status</td>
				<td class="actions-col">Actions</td>
			</tr>
		</thead>
		<tbody>
		<div class="content-main">
			<tr>
				<td>
					@if ($perms->ass_inv_ref == true)
						{{ $value->ass_inv_ref }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->ass_inv_amount == true)
						{{ $value->ass_inv_amount }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->ass_inv_vat == true)
						{{ $value->ass_inv_vat }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->ass_inv_tot == true)
						{{ $value->ass_inv_tot }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->ass_inv_date == true)
						{{ $value->ass_inv_date }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->ass_inv_status == true)
						{{ $value->ass_inv_status }}
					@else
					    N/A
					@endif
				</td>

				<!-- we will also add show, edit, and delete buttons -->
				<td class="actions-col">

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<!-- <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a> -->

					<a class="btn btn-small btn-success" href="{{ URL::to('notes/' . $value->id . '/edit#collapseThree') }}">Notes</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit#collapseThree') }}">Edit</a>

					{{ Form::open(array('url' => 'orders/' . $value->id, 'class' => 'delete-btn')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
					{{ Form::close() }}

				</td>
			</tr>
			</div>
		</tbody>
	</table>
	<table class="table table-striped table-bordered hidden" id="survey<?php echo $value->id?>">
		<thead>
			<tr>
				<td>Survey Date</td>
				<td>Survey Time</td>
				<td>Access Arrangements</td>
				<td>Access Email</td>
				<td>Access Address</td>
				<td class="actions-col">Actions</td>
			</tr>
		</thead>
		<tbody>
		<div class="content-main">
			<tr>
				<td>
					@if ($perms->sur_date == true)
						{{ $value->sur_date }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->sur_time == true)
						{{ $value->sur_time }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->sur_arr == true)
						{{ $value->sur_arr }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->sur_email == true)
						{{ $value->sur_email }}
					@else
					    N/A
					@endif
				</td>
				<td>
					@if ($perms->sur_address == true)
						{{ $value->sur_address }}
					@else
					    N/A
					@endif
				</td>

				<!-- we will also add show, edit, and delete buttons -->
				<td class="actions-col">

					<!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
					<!-- we will add this later since its a little more complicated than the other two buttons -->

					<!-- show the nerd (uses the show method found at GET /nerds/{id} -->
					<!-- <a class="btn btn-small btn-success" href="{{ URL::to('orders/' . $value->id) }}">Show</a> -->

					<a class="btn btn-small btn-success" href="{{ URL::to('notes/' . $value->id . '/edit#collapseFour') }}">Notes</a>

					<!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
					<a class="btn btn-small btn-info" href="{{ URL::to('orders/' . $value->id . '/edit#collapseFour') }}">Edit</a>

					{{ Form::open(array('url' => 'orders/' . $value->id, 'class' => 'delete-btn')) }}
						{{ Form::hidden('_method', 'DELETE') }}
						{{ Form::submit('Delete', array('class' => 'btn btn-small btn-warning')) }}
					{{ Form::close() }}

				</td>
			</tr>
			</div>
		</tbody>
	</table>
	<h4>{{ $value->doc1 }} | {{ $value->doc2 }} | {{ $value->doc3 }} | {{ $value->doc4 }} | {{ $value->doc5 }} </h4>
</div>
<hr>
@endforeach
<?php echo $orders->links(); ?>