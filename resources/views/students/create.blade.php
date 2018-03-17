
<div class="panel-heading">
    Create Student
</div>
<div class="panel-body">
    {!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Student name', ['class' => 'control-label']) !!}
        {!! Form::text('name', '', ['class' => 'form-control', 'required', 'placeholder' => 'Student name']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('E-mail', 'email', ['class' => 'control-label']) !!}
        {!! Form::text('email', '', ['class' => 'form-control', 'required', 'placeholder' => 'Student email']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', '', ['class' => 'form-control', 'required', 'placeholder' => 'Student phone']) !!}
    </div>
    <div class="form-group">
        {!! Form::file('image', ['required']) !!}
    </div>
    <div class="form-group">
        @foreach($courses as $course)
            <div class="form-group course-check">
                {{Form::label( 'courses', $course->course_name)}}
                {{Form::checkbox( 'courses[]', $course->id)}}
            </div>
        @endforeach
    </div>
    <div>
        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
</div>
