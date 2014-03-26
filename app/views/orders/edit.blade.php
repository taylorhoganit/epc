{{ HTML::ul($errors->all()) }}

{{ Form::model($order, array('route' => array('orders.update', $order->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update {{ $order->address }}</h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Order Details
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        {{ Form::text('order_date', null, array('class'=>'form-control datepicker', 'placeholder'=>'Order Date')) }}
		{{ Form::text('epc_name', null, array('class'=>'form-control', 'placeholder'=>'EPC Name')) }}
		{{ Form::text('epc_tel', null, array('class'=>'form-control', 'placeholder'=>'EPC Tel')) }}
		{{ Form::text('epc_email', null, array('class'=>'form-control', 'placeholder'=>'EPC Email')) }}
		{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
		{{ Form::text('postcode', null, array('class'=>'form-control', 'placeholder'=>'Postcode')) }}
    {{ Form::select('epc_status', array(''=>'Select EPC Status', 'Quoted'=>'Quoted', 'Instructed - To Schedule'=>'Instructed - To Schedule', 'To Survey'=>'To Survey', 'To Input'=>'To Input', 'Awaiting Payment - Report Produced'=>'Awaiting Payment - Report Produced', 'To Send'=>'To Send', 'Completed'=>'Completed', 'Cancelled'=>'Cancelled', 'On Hold'=>'On Hold'), $selected = NULL,  array('class' => 'form-control')) }}
		<!-- {{ Form::text('agent', null, array('class'=>'form-control', 'placeholder'=>'Agent')) }} -->
    <select name="agent" class="form-control">
      @foreach($agents as $key => $value)
        <option value="{{ $value->firstname }}">{{ $value->firstname }}</option>
      @endforeach
    </select>
    
		{{ Form::text('assessor', null, array('class'=>'form-control', 'placeholder'=>'Assessor')) }}
    {{ Form::select('type', array(''=>'Select Type', 'Commercial'=>'Commercial', 'Domestic'=>'Domestic', 'On Construction'=>'On Construction', 'SBEM New Build'=>'SBEM New Build'), $selected = NULL,  array('class' => 'form-control')) }}
		{{ Form::select('building_type', array(''=>'Select Building Type', 'Retail Domestic'=>'Retail Domestic', 'Retail'=>'Retail', 'Office'=>'Office', 'Warehouse'=>'Warehouse', 'Warehouse / Offices'=>'Warehouse / Offices', 'Retail Warehouse'=>'Retail Warehouse', 'Industrial'=>'Industrial', 'Public House'=>'Public House', 'Nursing / Care Home'=>'Nursing / Care Home', 'Hotel'=>'Hotel', 'Mixed Development'=>'Mixed Development', 'Restaurant'=>'Restaurant', 'Other'=>'Other',), $selected = NULL,  array('class' => 'form-control')) }}
		{{ Form::text('net_cost', null, array('class'=>'form-control', 'placeholder'=>'Net Cost')) }}
		{{ Form::select('floor_plans', array(''=>'Select Floor Plans', 'Yes'=>'Yes', 'No'=>'No'), $selected = NULL,  array('class' => 'form-control')) }}
		{{ Form::text('size', null, array('class'=>'form-control', 'placeholder'=>'Size')) }}
    {{ Form::select('size_type', array(''=>'Select Size Type', 'Feet'=>'Feet', 'Metres'=>'Metres'), $selected = NULL,  array('class' => 'form-control')) }}
		{{ Form::text('stories', null, array('class'=>'form-control', 'placeholder'=>'Stories')) }}
		{{ Form::text('time', null, array('class'=>'form-control', 'placeholder'=>'Time')) }}
    {{ Form::text('doc1', null, array('class'=>'form-control', 'placeholder'=>'Doc1')) }}
    <!--{{ Form::file('doc1') }}-->
		{{ Form::text('doc2', null, array('class'=>'form-control', 'placeholder'=>'Doc2')) }}
		{{ Form::text('doc3', null, array('class'=>'form-control', 'placeholder'=>'Doc3')) }}
		{{ Form::text('doc4', null, array('class'=>'form-control', 'placeholder'=>'Doc4')) }}
		{{ Form::text('doc5', null, array('class'=>'form-control', 'placeholder'=>'Doc5')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Invoice Details
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        {{ Form::text('inv_num', null, array('class'=>'form-control', 'placeholder'=>'Invoice Number')) }}
    		{{ Form::text('inv_net', null, array('class'=>'form-control', 'placeholder'=>'Invoice Net Cost')) }}
    		{{ Form::text('inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Invoice VAT')) }}
    		{{ Form::text('inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Invoice Total')) }}
    		{{ Form::text('inv_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Date')) }}
        {{ Form::select('inv_status', array(''=>'Select Invoice Status', 'To Create'=>'To Create', 'Pending'=>'Pending', 'Unpaid'=>'Unpaid', 'Paid'=>'Paid', 'Cancelled'=>'Cancelled', 'Re-Create'=>'Re-Create'), $selected = NULL,  array('class' => 'form-control')) }}
    		{{ Form::text('inv_name', null, array('class'=>'form-control', 'placeholder'=>'Invoice Name')) }}
    		{{ Form::text('inv_email', null, array('class'=>'form-control', 'placeholder'=>'Invoice Email')) }}
    		{{ Form::text('inv_address', null, array('class'=>'form-control', 'placeholder'=>'Invoice Address')) }}
    		{{ Form::text('inv_postcode', null, array('class'=>'form-control', 'placeholder'=>'Invoice Postcode')) }}
    		{{ Form::text('inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Due Date')) }}
    		{{ Form::text('inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Paid Date')) }}
    		{{ Form::text('method', null, array('class'=>'form-control', 'placeholder'=>'Method')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Assessor Invoice Reference
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        {{ Form::text('ass_inv_ref', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Reference')) }}
    		{{ Form::text('ass_inv_amount', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Amount')) }}
    		{{ Form::text('ass_inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice VAT')) }}
    		{{ Form::text('ass_inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Total')) }}
    		{{ Form::text('ass_inv_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Date')) }}
    		{{ Form::select('inv_status', array(''=>'Select Assessor Invoice Status', 'Submitted'=>'Submitted', 'Approved'=>'Approved', 'Paid'=>'Paid'), $selected = NULL,  array('class' => 'form-control')) }}
    		{{ Form::text('ass_inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Due Date')) }}
    		{{ Form::text('ass_inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Paid Date')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Survey Appointment Details
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
       	{{ Form::text('sur_date', null, array('class'=>'form-control', 'placeholder'=>'Survey Date')) }}
		{{ Form::text('sur_time', null, array('class'=>'form-control', 'placeholder'=>'Survey Time')) }}
		{{ Form::text('sur_arr', null, array('class'=>'form-control', 'placeholder'=>'Survey Address')) }}
		{{ Form::text('sur_email', null, array('class'=>'form-control', 'placeholder'=>'Survey Email')) }}
		{{ Form::text('sur_address', null, array('class'=>'form-control', 'placeholder'=>'Survey Address')) }}
		{{ Form::text('sur_postcode', null, array('class'=>'form-control', 'placeholder'=>'Survey Postcode')) }}
      </div>
    </div>
  </div>
</div>	

	{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}