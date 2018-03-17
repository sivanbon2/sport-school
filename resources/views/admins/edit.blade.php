<div class="panel-body">
    {!! Form::open(['action' => ['AdminsController@update', $user->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Admin name', ['class' => 'control-label']) !!}
        {!! Form::text('name', $user->name, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('E-mail', 'email', ['class' => 'control-label']) !!}
        {!! Form::text('email', $user->email, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', $user->phone, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        <label class="btn btn-default btn-file">
           Browse <input type="file" name="image" style="display: none;">
        </label>
            {{$user->image}}
    </div>
    <div>
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>
    {{  Form::hidden('_method', 'PUT' ) }}
    {!! Form::close() !!}
</div>
