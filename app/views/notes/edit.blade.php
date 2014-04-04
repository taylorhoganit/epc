{{ HTML::ul($errors->all()) }}

{{ Form::model($order, array('route' => array('notes.update', $order->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update Notes {{ $order->id }}</h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseOne">
          Order Notes
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
      <div class="panel-body">
        @if ($perms->order_notes == '2')
          {{ Form::textarea('order_notes', null, array('class'=>'form-control', 'placeholder'=>'Order Notes')) }} 
        @elseif ($perms->order_notes == '1')
          {{ Form::textarea('order_notes', null, array('class'=>'form-control', 'placeholder'=>'Order Notes', 'READONLY')) }}
        @else 
          {{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseTwo">
          Invoice Notes
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        @if ($perms->inv_notes == '2')
          {{ Form::textarea('inv_notes', null, array('class'=>'form-control', 'placeholder'=>'Invoice Notes')) }} 
        @elseif ($perms->inv_notes == '1')
          {{ Form::textarea('inv_notes', null, array('class'=>'form-control', 'placeholder'=>'Invoice Notes', 'READONLY')) }}
        @else 
          {{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseThree">
          Assessor Invoice Reference Notes
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        @if ($perms->ass_notes == '2')
          {{ Form::textarea('ass_notes', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Notes')) }}
        @elseif ($perms->ass_notes == '1')
          {{ Form::textarea('ass_notes', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Notes', 'READONLY')) }}
        @else 
          {{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" class="nav-tabs" href="#collapseFour">
          Survey Appointment Details Notes
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
        @if ($perms->sur_notes == '2')
          {{ Form::textarea('sur_notes', null, array('class'=>'form-control', 'placeholder'=>'Survey Appointment Notes')) }}
        @elseif ($perms->sur_notes == '1')
          {{ Form::textarea('sur_notes', null, array('class'=>'form-control', 'placeholder'=>'Survey Appointment Notes', 'READONLY')) }}
        @else 
          {{ Form::textarea('text', null, array('class'=>'form-control', 'placeholder'=>'N/A', 'READONLY')) }}
        @endif
      </div>
    </div>
  </div>
</div>	
{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}