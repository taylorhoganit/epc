<h3>Update {{ $user->firstname }} {{ $user->lastname }}</h3>
{{ Form::open(array('url'=>'users/edit/' . $user->id . '', 'method' => 'PUT', 'class'=>'form-signup')) }}
<ul>
@foreach($errors->all() as $error)
    <li>{{ $error }}</li>
@endforeach
</ul>

{{ Form::text('firstname',  $user->firstname, array('class'=>'form-control')) }}
{{ Form::text('lastname', $user->lastname, array('class'=>'form-control', 'placeholder'=>'Last Name')) }}
{{ Form::text('email', $user->email, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
{{ Form::select('type', array(''=>'Select Type', 'Administrator'=>'Administrator', 'Agent'=>'Agent', 'Assessor'=>'Assessor', 'Super'=>'Super'), $selected = $user->type,  array('class' => 'form-control')) }}
{{ Form::text('address', $user->address, array('class'=>'form-control', 'placeholder'=>'Address')) }}
{{ Form::text('postcode', $user->postcode, array('class'=>'form-control', 'placeholder'=>'Postcode')) }}

{{ Form::submit('Update', array('class'=>'btn btn-large btn-primary btn-block'))}}
{{ Form::close() }}