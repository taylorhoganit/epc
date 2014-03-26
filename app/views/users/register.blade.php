{{ Form::open(array('url'=>'users/create', 'class'=>'form-signup')) }}
<h2 class="form-signup-heading">Please Register</h2>

<ul>
@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>

{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First Name')) }}
{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}
{{ Form::select('type', array(''=>'Select Type', 'Administrator'=>'Administrator', 'Agent'=>'Agent', 'Assessor'=>'Assessor', 'Super'=>'Super'), $selected = NULL,  array('class' => 'form-control')) }}
{{ Form::text('address', null, array('class'=>'form-control', 'placeholder'=>'Address')) }}
{{ Form::text('postcode', null, array('class'=>'form-control', 'placeholder'=>'Postcode')) }}

{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}