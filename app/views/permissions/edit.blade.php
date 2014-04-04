{{ HTML::ul($errors->all()) }}

{{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update Permissions: {{ $permission->user_type }}</h3>
<p>0 = No Access | 1 = Read Only | 2 = Full</p>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseOne">
          Order Permissions
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
		{{ Form::label('order_date', 'Order Date') }}
		{{ Form::text('order_date', null, array('class'=>'form-control')) }}
		{{ Form::label('epc_name', 'EPC Name') }}
		{{ Form::text('epc_name', null, array('class'=>'form-control')) }}
		{{ Form::label('epc_tel', 'EPC Telephone') }}
		{{ Form::text('epc_tel', null, array('class'=>'form-control')) }}
		{{ Form::label('epc_email', 'EPC Email') }}
		{{ Form::text('epc_email', null, array('class'=>'form-control')) }}
		{{ Form::label('address', 'Address') }}
		{{ Form::text('address', null, array('class'=>'form-control')) }}
		{{ Form::label('postcode', 'Postcode') }}
		{{ Form::text('postcode', null, array('class'=>'form-control')) }}
		{{ Form::label('epc_status', 'EPC Status') }}
		{{ Form::text('epc_status', null, array('class'=>'form-control')) }}
		{{ Form::label('agent', 'Agent') }}
		{{ Form::text('agent', null, array('class'=>'form-control')) }}
		{{ Form::label('assessor', 'Assessor') }}
		{{ Form::text('assessor', null, array('class'=>'form-control')) }}
		{{ Form::label('type', 'Type') }}
		{{ Form::text('type', null, array('class'=>'form-control')) }}
		{{ Form::label('building_type', 'Building Type') }}
		{{ Form::text('building_type', null, array('class'=>'form-control')) }}
		{{ Form::label('net_cost', 'Net Cost') }}
		{{ Form::text('net_cost', null, array('class'=>'form-control')) }}
		{{ Form::label('floor_plans', 'Floor Plans') }}
		{{ Form::text('floor_plans', null, array('class'=>'form-control')) }}
		{{ Form::label('size', 'Size') }}
		{{ Form::text('size', null, array('class'=>'form-control')) }}
		{{ Form::label('size_type', 'Size Type') }}
		{{ Form::text('size_type', null, array('class'=>'form-control')) }}
		{{ Form::label('stories', 'Stories') }}
		{{ Form::text('stories', null, array('class'=>'form-control')) }}
		{{ Form::label('time', 'Time') }}
		{{ Form::text('time', null, array('class'=>'form-control')) }}
		{{ Form::label('doc1', 'Doc 1') }}
		{{ Form::text('doc1', null, array('class'=>'form-control')) }}
		{{ Form::label('doc2', 'Doc 2') }}
		{{ Form::text('doc2', null, array('class'=>'form-control')) }}
		{{ Form::label('doc3', 'Doc 3') }}
		{{ Form::text('doc3', null, array('class'=>'form-control')) }}
		{{ Form::label('doc4', 'Doc 4') }}
		{{ Form::text('doc4', null, array('class'=>'form-control')) }}
		{{ Form::label('doc5', 'Doc 5') }}
		{{ Form::text('doc5', null, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseTwo">
          Invoice Permissions
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        {{ Form::label('inv_num', 'Invoice Number') }}
		{{ Form::text('inv_num', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_net', 'Invoice Net Cost') }}
		{{ Form::text('inv_net', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_vat', 'Invoice VAT') }}
		{{ Form::text('inv_vat', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_tot', 'Invoice Total') }}
		{{ Form::text('inv_tot', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_date', 'Invoice Date') }}
		{{ Form::text('inv_date', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_status', 'Invoice Status') }}
		{{ Form::text('inv_status', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_name', 'Invoice Name') }}
		{{ Form::text('inv_name', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_email', 'Invoice Email') }}
		{{ Form::text('inv_email', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_address', 'Invoice Address') }}
		{{ Form::text('inv_address', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_postcode', 'Invoice Postcode') }}
		{{ Form::text('inv_postcode', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_due_date', 'Invoice Due Date') }}
		{{ Form::text('inv_due_date', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_paid_date', 'Invoice Paid Date') }}
		{{ Form::text('inv_paid_date', null, array('class'=>'form-control')) }}
		{{ Form::label('method', 'Method') }}
		{{ Form::text('method', null, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseThree">
          Assessor Invoice Reference Permissions
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
		{{ Form::label('ass_inv_ref', 'Assessor Invoice Reference') }}
		{{ Form::text('ass_inv_ref', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_amount', 'Assessor Invoice Amount') }}
		{{ Form::text('ass_inv_amount', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_vat', 'Assessor Invoice VAT') }}
		{{ Form::text('ass_inv_vat', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_tot', 'Assessor Invoice Total') }}
		{{ Form::text('ass_inv_tot', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_date', 'Assessor Invoice Date') }}
		{{ Form::text('ass_inv_date', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_status', 'Assessor Invoice Status') }}
		{{ Form::text('ass_inv_status', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_due_date', 'Assessor Invoice Due Date') }}
		{{ Form::text('ass_inv_due_date', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_inv_paid_date', 'Assessor Invoice Paid Date') }}
		{{ Form::text('ass_inv_paid_date', null, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseFour">
          Survey Appointment Details Permissions
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
		{{ Form::label('sur_date', 'Survey Date') }}
		{{ Form::text('sur_date', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_time', 'Survey Time') }}
		{{ Form::text('sur_time', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_arr', 'Survey Arrangements') }}
		{{ Form::text('sur_arr', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_email', 'Survey Email') }}
		{{ Form::text('sur_email', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_address', 'Survey Address') }}
		{{ Form::text('sur_address', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_postcode', 'Survey Postcode') }}
		{{ Form::text('sur_postcode', null, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseFive">
          Notes Permissions
        </a>
      </h4>
    </div>
    <div id="collapseFive" class="panel-collapse collapse">
      <div class="panel-body">
		{{ Form::label('order_notes', 'Order Notes') }}
		{{ Form::text('order_notes', null, array('class'=>'form-control')) }}
		{{ Form::label('inv_notes', 'Invoice Notes') }}
		{{ Form::text('inv_notes', null, array('class'=>'form-control')) }}
		{{ Form::label('ass_notes', 'Assessor Invoice Notes') }}
		{{ Form::text('ass_notes', null, array('class'=>'form-control')) }}
		{{ Form::label('sur_notes', 'Survey Notes') }}
		{{ Form::text('sur_notes', null, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
</div>	

{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}