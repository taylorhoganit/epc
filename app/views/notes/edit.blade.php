{{ HTML::ul($errors->all()) }}

{{ Form::model($order, array('route' => array('notes.update', $order->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update Notes {{ $order->id }}</h3>

<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Order Notes
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
		{{ Form::textarea('order_notes', null, array('class'=>'form-control', 'placeholder'=>'Order Notes')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Invoice Notes
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        {{ Form::textarea('inv_notes', null, array('class'=>'form-control', 'placeholder'=>'Invoice Notes')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
          Assessor Invoice Reference Notes
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        {{ Form::textarea('ass_notes', null, array('class'=>'form-control', 'placeholder'=>'Assessor Invoice Notes')) }}
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
          Survey Appointment Details Notes
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body">
		{{ Form::textarea('sur_notes', null, array('class'=>'form-control', 'placeholder'=>'Survey Appointment Notes')) }}
      </div>
    </div>
  </div>
</div>	
{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}