
<div class="panel-heading">
    Create Admin
</div>
<div class="panel-body">
    {!! Form::open(['action' => 'AdminsController@store', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Admin name', ['class' => 'control-label']) !!}
        {!! Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'Admin name']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'email', ['class' => 'control-label']) !!}
        {!! Form::email('email', '', ['class' => 'form-control', 'required', 'placeholder' => 'Admin email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', '', ['class' => 'form-control', 'required', 'placeholder' => 'Phone']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('role_id', 'Role', ['class' => 'control-label']) !!}
        {!! Form::select('role_id', array( '2' => 'Manager', '3' => 'Sale' ))!!}
    </div>
    <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
        {!! Form::password('password');!!}
    </div>
    <div class="form-group">
        {!! Form::label('confirm_password', 'Confirm Password', ['class' => 'control-label']) !!}
        {!! Form::password('confirm_password');!!}
    </div>
    <div class="form-group">
        {!! Form::file('image', ['required']) !!}
    </div>
    <div>
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
