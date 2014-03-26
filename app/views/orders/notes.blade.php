{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url'=>'orders/notes/' . $order->id . '/edit', 'method' => 'PUT', 'class'=>'form-signup')) }}
<h1>Notes {{ $order->id }}</h1>
{{ Form::text('order_notes', null, array('class'=>'form-control', 'placeholder'=>'Order Notes')) }}
{{ Form::text('inv_notes', null, array('class'=>'form-control', 'placeholder'=>'Invoice Notes')) }}
{{ Form::text('ass_notes', null, array('class'=>'form-control', 'placeholder'=>'Assessor Notes')) }}
{{ Form::text('sur_notes', null, array('class'=>'form-control', 'placeholder'=>'Survey Notes')) }}
{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}