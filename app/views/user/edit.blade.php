{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('user.update', $user->id), 'method' => 'PUT', 'class'=>'form-signup', 'files' => true)) }}
<h3>Update User {{ $user->firstname }}</h3>

{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email')) }}
{{ Form::select('type', array(''=>'Select Type', 'Administrator'=>'Administrator', 'Agent'=>'Agent', 'Assessor'=>'Assessor', 'Super'=>'Super'), $selected = NULL,  array('class' => 'form-control')) }}
{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
{{ Form::text('postcode', null, array('class'=>'form-control', 'placeholder'=>'Postcode')) }}

{{ Form::submit('Update', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}