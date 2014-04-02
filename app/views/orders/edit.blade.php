{{ HTML::ul($errors->all()) }}

{{ Form::model($order, array('route' => array('orders.update', $order->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update {{ $order->address }}</h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseOne">
          Order Details
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse ">
      <div class="panel-body">
        <!-- Order Date -->
        @if ($perms->order_date == '2')
          {{ Form::text('order_date', null, array('class'=>'form-control datepicker', 'placeholder'=>'Order Date')) }} 
        @elseif ($perms->order_date == '1')
          {{ Form::text('order_date', null, array('class'=>'form-control datepicker', 'placeholder'=>'Order Date', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- EPC Name -->
        @if ($perms->epc_name == '2')
          {{ Form::text('epc_name', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Name')) }} 
        @elseif ($perms->epc_name == '1')
          {{ Form::text('epc_name', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Name', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- EPC Tel -->
        @if ($perms->epc_tel == '2')
          {{ Form::text('epc_tel', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Telephone')) }} 
        @elseif ($perms->epc_tel == '1')
          {{ Form::text('epc_tel', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Telephone', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- EPC Email -->
        @if ($perms->epc_email == '2')
          {{ Form::text('epc_email', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Email')) }} 
        @elseif ($perms->epc_email == '1')
          {{ Form::text('epc_email', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Email', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Address -->
        @if ($perms->address == '2')
          {{ Form::text('address', null, array('class'=>'form-control datepicker', 'placeholder'=>'Address')) }} 
        @elseif ($perms->address == '1')
          {{ Form::text('address', null, array('class'=>'form-control datepicker', 'placeholder'=>'Address', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Postcode -->
        @if ($perms->postcode == '2')
          {{ Form::text('postcode', null, array('class'=>'form-control datepicker', 'placeholder'=>'Postcode')) }} 
        @elseif ($perms->postcode == '1')
          {{ Form::text('postcode', null, array('class'=>'form-control datepicker', 'placeholder'=>'Postcode', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- EPC Status -->
        @if ($perms->epc_status == '2')
          {{ Form::select('epc_status', array(''=>'Select EPC Status', 'Quoted'=>'Quoted', 'Instructed - To Schedule'=>'Instructed - To Schedule', 'To Survey'=>'To Survey', 'To Input'=>'To Input', 'Awaiting Payment - Report Produced'=>'Awaiting Payment - Report Produced', 'To Send'=>'To Send', 'Completed'=>'Completed', 'Cancelled'=>'Cancelled', 'On Hold'=>'On Hold'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->epc_status == '1')
          {{ Form::text('epc_status', null, array('class'=>'form-control datepicker', 'placeholder'=>'EPC Status', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Agent -->
        @if ($perms->agent == '2')
          <select name="agent" class="form-control">
            <option value="{{ $order->agent }}">{{ $order->agent }}</option>
            @foreach(User::where('type', '=', 'Agent')->get() as $agent)
              <option value="{{ $agent->firstname }} {{ $agent->lastname }}">{{ $agent->firstname }} {{ $agent->lastname }}</option>
            @endforeach
          </select>
        @elseif ($perms->agent == '1')
          {{ Form::text('agent', null, array('class'=>'form-control datepicker', 'placeholder'=>'Agent', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor -->
        @if ($perms->assessor == '2')
          <select name="assessor" class="form-control">
            <option value="{{ $order->assessor }}">{{ $order->assessor }}</option>
            @foreach(User::where('type', '=', 'Assessor')->get() as $assessor)
              <option value="{{ $assessor->firstname }} {{ $assessor->lastname }}">{{ $assessor->firstname }} {{ $assessor->lastname }}</option>
            @endforeach
          </select>
        @elseif ($perms->assessor == '1')
          {{ Form::text('assessor', null, array('class'=>'form-control datepicker', 'placeholder'=>'Assessor', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Type -->
        @if ($perms->type == '2')
          {{ Form::select('type', array(''=>'Select Type', 'Commercial'=>'Commercial', 'Domestic'=>'Domestic', 'On Construction'=>'On Construction', 'SBEM New Build'=>'SBEM New Build'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->type == '1')
          {{ Form::text('type', null, array('class'=>'form-control datepicker', 'placeholder'=>'Type', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Type -->
        @if ($perms->building_type == '2')
          {{ Form::select('building_type', array(''=>'Select Building Type', 'Retail Domestic'=>'Retail Domestic', 'Retail'=>'Retail', 'Office'=>'Office', 'Warehouse'=>'Warehouse', 'Warehouse / Offices'=>'Warehouse / Offices', 'Retail Warehouse'=>'Retail Warehouse', 'Industrial'=>'Industrial', 'Public House'=>'Public House', 'Nursing / Care Home'=>'Nursing / Care Home', 'Hotel'=>'Hotel', 'Mixed Development'=>'Mixed Development', 'Restaurant'=>'Restaurant', 'Other'=>'Other',), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->building_type == '1')
          {{ Form::text('building_type', null, array('class'=>'form-control datepicker', 'placeholder'=>'Building Type', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Net Cost -->
        @if ($perms->net_cost == '2')
          {{ Form::text('net_cost', null, array('class'=>'form-control', 'placeholder'=>'Net Cost')) }}
        @elseif ($perms->net_cost == '1')
          {{ Form::text('net_cost', null, array('class'=>'form-control datepicker', 'placeholder'=>'Net Cost', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Floor Plans -->
        @if ($perms->floor_plans == '2')
          {{ Form::select('floor_plans', array(''=>'Select Floor Plans', 'Yes'=>'Yes', 'No'=>'No'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->floor_plans == '1')
          {{ Form::text('floor_plans', null, array('class'=>'form-control datepicker', 'placeholder'=>'Floor Plans', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
    		<!-- Size -->
        @if ($perms->size == '2')
          {{ Form::text('size', null, array('class'=>'form-control', 'placeholder'=>'Size')) }}
        @elseif ($perms->size == '1')
          {{ Form::text('size', null, array('class'=>'form-control datepicker', 'placeholder'=>'Size', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
    		<!-- Size Type -->
        @if ($perms->size_type == '2')
          {{ Form::select('size_type', array(''=>'Select Size Type', 'Feet'=>'Feet', 'Metres'=>'Metres'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->size_type == '1')
          {{ Form::text('size_type', null, array('class'=>'form-control datepicker', 'placeholder'=>'Size Type', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
    		<!-- Stories -->
        @if ($perms->stories == '2')
          {{ Form::text('stories', null, array('class'=>'form-control', 'placeholder'=>'Stories')) }}
        @elseif ($perms->stories == '1')
          {{ Form::text('stories', null, array('class'=>'form-control datepicker', 'placeholder'=>'Stories', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
    		<!-- Time -->
        @if ($perms->time == '2')
          {{ Form::text('time', null, array('class'=>'form-control', 'placeholder'=>'Time')) }}
        @elseif ($perms->time == '1')
          {{ Form::text('time', null, array('class'=>'form-control datepicker', 'placeholder'=>'Time', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Doc 1 -->
        @if ($perms->doc1 == '2')
          {{ Form::text('doc1', null, array('class'=>'form-control', 'placeholder'=>'Doc 1')) }}
        @elseif ($perms->doc1 == '1')
          {{ Form::text('doc1', null, array('class'=>'form-control datepicker', 'placeholder'=>'Doc 1', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Doc 2 -->
        @if ($perms->doc2 == '2')
          {{ Form::text('doc2', null, array('class'=>'form-control', 'placeholder'=>'Doc 2')) }}
        @elseif ($perms->doc2 == '1')
          {{ Form::text('doc2', null, array('class'=>'form-control datepicker', 'placeholder'=>'Doc 2', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Doc 3 -->
        @if ($perms->doc3 == '2')
          {{ Form::text('doc3', null, array('class'=>'form-control', 'placeholder'=>'Doc 3')) }}
        @elseif ($perms->doc3 == '1')
          {{ Form::text('doc3', null, array('class'=>'form-control datepicker', 'placeholder'=>'Doc 3', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Doc 4 -->
        @if ($perms->doc4 == '2')
          {{ Form::text('doc4', null, array('class'=>'form-control', 'placeholder'=>'Doc 4')) }}
        @elseif ($perms->doc4 == '1')
          {{ Form::text('doc4', null, array('class'=>'form-control datepicker', 'placeholder'=>'Doc 4', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Doc 5 -->
        @if ($perms->doc5 == '2')
          {{ Form::text('doc5', null, array('class'=>'form-control', 'placeholder'=>'Doc 5')) }}
        @elseif ($perms->doc5 == '1')
          {{ Form::text('doc5', null, array('class'=>'form-control datepicker', 'placeholder'=>'Doc 5', 'READONLY')) }} 
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseTwo">
          Invoice Details
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- Invoice Number -->
        @if ($perms->inv_num == '2')
          {{ Form::text('inv_num', null, array('class'=>'form-control', 'placeholder'=>'Invoice Number')) }}
        @elseif ($perms->inv_num == '1')
          {{ Form::text('inv_num', null, array('class'=>'form-control', 'placeholder'=>'Invoice Number', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Net -->
        @if ($perms->inv_net == '2')
          {{ Form::text('inv_net', null, array('class'=>'form-control', 'placeholder'=>'Invoice Net')) }}
        @elseif ($perms->inv_net == '1')
          {{ Form::text('inv_net', null, array('class'=>'form-control', 'placeholder'=>'Invoice Net', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Vat -->
        @if ($perms->inv_vat == '2')
          {{ Form::text('inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Invoice Vat')) }}
        @elseif ($perms->inv_vat == '1')
          {{ Form::text('inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Invoice Vat', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Total -->
        @if ($perms->inv_tot == '2')
          {{ Form::text('inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Invoice Total')) }}
        @elseif ($perms->inv_tot == '1')
          {{ Form::text('inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Invoice Total', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Date -->
        @if ($perms->inv_date == '2')
          {{ Form::text('inv_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Date')) }}
        @elseif ($perms->inv_date == '1')
          {{ Form::text('inv_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Status -->
        @if ($perms->inv_status == '2')
          {{ Form::select('inv_status', array(''=>'Select Invoice Status', 'To Create'=>'To Create', 'Pending'=>'Pending', 'Unpaid'=>'Unpaid', 'Paid'=>'Paid', 'Cancelled'=>'Cancelled', 'Re-Create'=>'Re-Create'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->inv_status == '1')
          {{ Form::text('inv_status', null, array('class'=>'form-control', 'placeholder'=>'Invoice Status', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Name -->
        @if ($perms->inv_name == '2')
          {{ Form::text('inv_name', null, array('class'=>'form-control', 'placeholder'=>'Invoice Name')) }}
        @elseif ($perms->inv_name == '1')
          {{ Form::text('inv_name', null, array('class'=>'form-control', 'placeholder'=>'Invoice Name', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Email -->
        @if ($perms->inv_email == '2')
          {{ Form::text('inv_email', null, array('class'=>'form-control', 'placeholder'=>'Invoice Email')) }}
        @elseif ($perms->inv_email == '1')
          {{ Form::text('inv_email', null, array('class'=>'form-control', 'placeholder'=>'Invoice Email', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Address -->
        @if ($perms->inv_address == '2')
          {{ Form::text('inv_address', null, array('class'=>'form-control', 'placeholder'=>'Invoice Address')) }}
        @elseif ($perms->inv_address == '1')
          {{ Form::text('inv_address', null, array('class'=>'form-control', 'placeholder'=>'Invoice Address', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Postcode -->
        @if ($perms->inv_postcode == '2')
          {{ Form::text('inv_postcode', null, array('class'=>'form-control', 'placeholder'=>'Invoice Postcode')) }}
        @elseif ($perms->inv_postcode == '1')
          {{ Form::text('inv_postcode', null, array('class'=>'form-control', 'placeholder'=>'Invoice Postcode', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Due Date -->
        @if ($perms->inv_due_date == '2')
          {{ Form::text('inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Due Date')) }}
        @elseif ($perms->inv_due_date == '1')
          {{ Form::text('inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Due Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Paid Date -->
        @if ($perms->inv_paid_date == '2')
          {{ Form::text('inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Paid Date')) }}
        @elseif ($perms->inv_paid_date == '1')
          {{ Form::text('inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Invoice Paid Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Invoice Method -->
        @if ($perms->method == '2')
          {{ Form::text('method', null, array('class'=>'form-control', 'placeholder'=>'Method')) }}
        @elseif ($perms->method == '1')
          {{ Form::text('method', null, array('class'=>'form-control', 'placeholder'=>'Method', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseThree">
          Assessor Invoice Reference
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- Ass Inv Ref -->
        @if ($perms->ass_inv_ref == '2')
          {{ Form::text('ass_inv_ref', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Reference')) }}
        @elseif ($perms->ass_inv_ref == '1')
          {{ Form::text('ass_inv_ref', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Reference', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Amount -->
        @if ($perms->ass_inv_amount == '2')
          {{ Form::text('ass_inv_amount', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Amount')) }}
        @elseif ($perms->ass_inv_amount == '1')
          {{ Form::text('ass_inv_amount', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Amount', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice VAT  -->
        @if ($perms->ass_inv_vat == '2')
          {{ Form::text('ass_inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice VAT')) }}
        @elseif ($perms->ass_inv_vat == '1')
          {{ Form::text('ass_inv_vat', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice VAT', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Total -->
        @if ($perms->ass_inv_tot == '2')
          {{ Form::text('ass_inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Total')) }}
        @elseif ($perms->ass_inv_tot == '1')
          {{ Form::text('ass_inv_tot', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Total', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Date -->
        @if ($perms->ass_inv_date == '2')
          {{ Form::text('ass_inv_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Date')) }}
        @elseif ($perms->ass_inv_date == '1')
          {{ Form::text('ass_inv_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Status -->
        @if ($perms->ass_inv_status == '2')
          {{ Form::select('ass_inv_status', array(''=>'Select Assessor Invoice Status', 'Submitted'=>'Submitted', 'Approved'=>'Approved', 'Paid'=>'Paid'), $selected = NULL,  array('class' => 'form-control')) }}
        @elseif ($perms->ass_inv_status == '1')
          {{ Form::text('ass_inv_status', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Status', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Due Date -->
        @if ($perms->ass_inv_due_date == '2')
          {{ Form::text('ass_inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Due Date')) }}
        @elseif ($perms->ass_inv_due_date == '1')
          {{ Form::text('ass_inv_due_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Due Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Assessor Invoice Paid Date -->
        @if ($perms->ass_inv_paid_date == '2')
          {{ Form::text('ass_inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Paid Date')) }}
        @elseif ($perms->ass_inv_paid_date == '1')
          {{ Form::text('ass_inv_paid_date', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Paid Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseFour">
          Survey Appointment Details
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        <!-- Survey Date -->
        @if ($perms->sur_date == '2')
          {{ Form::text('sur_date', null, array('class'=>'form-control', 'placeholder'=>'Survey Date')) }}
        @elseif ($perms->sur_date == '1')
          {{ Form::text('sur_date', null, array('class'=>'form-control', 'placeholder'=>'Survey Date', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Survey Time -->
        @if ($perms->sur_time == '2')
          {{ Form::text('sur_time', null, array('class'=>'form-control', 'placeholder'=>'Survey Time')) }}
        @elseif ($perms->sur_time == '1')
          {{ Form::text('sur_time', null, array('class'=>'form-control', 'placeholder'=>'Survey Time', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Survey Arrangements -->
        @if ($perms->sur_arr == '2')
          {{ Form::text('sur_arr', null, array('class'=>'form-control', 'placeholder'=>'Survey Arrangments')) }}
        @elseif ($perms->sur_arr == '1')
          {{ Form::text('sur_arr', null, array('class'=>'form-control', 'placeholder'=>'Survey Arrangements', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Survey Email -->
        @if ($perms->sur_email == '2')
          {{ Form::text('sur_email', null, array('class'=>'form-control', 'placeholder'=>'Survey Email')) }}
        @elseif ($perms->sur_email == '1')
          {{ Form::text('sur_email', null, array('class'=>'form-control', 'placeholder'=>'Survey Email', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Survey Address -->
        @if ($perms->sur_address == '2')
          {{ Form::text('sur_address', null, array('class'=>'form-control', 'placeholder'=>'Survey Address')) }}
        @elseif ($perms->sur_address == '1')
          {{ Form::text('sur_address', null, array('class'=>'form-control', 'placeholder'=>'Survey Address', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
        <!-- Survey Postcode -->
        @if ($perms->sur_postcode == '2')
          {{ Form::text('sur_postcode', null, array('class'=>'form-control', 'placeholder'=>'Survey Postcode')) }}
        @elseif ($perms->sur_postcode == '1')
          {{ Form::text('sur_postcode', null, array('class'=>'form-control', 'placeholder'=>'Survey Postcode', 'READONLY')) }}
        @else 
          {{ Form::text('text', null, array('class'=>'form-control datepicker', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
</div>	

	{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}