
<div class="panel-heading">
    Create Course
</div>
<div class="panel-body">
    {!! Form::open(['action' => 'CoursesController@store', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('course_name', 'Course name', ['class' => 'control-label']) !!}
        {!! Form::text('course_name', '', ['class' => 'form-control','placeholder' => 'Course name', 'required']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('course_price', 'Course price', ['class' => 'control-label']) !!}
        {!! Form::text('course_price', '', ['class' => 'form-control','placeholder' => 'Course price', 'required']) !!}

    </div>
    <div class="form-group">
        {!! Form::label('course_description', 'Course description', ['class' => 'control-label']) !!}
        {!! Form::textarea('course_description', '', ['class' => 'form-control','placeholder' => 'Course description', 'required' ])!!}
    </div>
    <div class="form-group">
        {!! Form::file('image', ['required']) !!}
    </div>
    <div>
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
