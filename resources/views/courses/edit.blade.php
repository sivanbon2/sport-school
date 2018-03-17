<div class="panel-body">
    {!! Form::open(['action' => ['CoursesController@update', $course->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('course_name', 'Course name', ['class' => 'control-label']) !!}
        {!! Form::text('course_name', $course->course_name, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('course_price', 'Course price', ['class' => 'control-label']) !!}
        {!! Form::text('course_price', $course->price, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('course_description', 'Course description', ['class' => 'control-label']) !!}
        {{Form::textarea('course_description', $course->description, ['class' => 'form-control', 'placeholder' => 'Description', 'required'])}}
    </div>
    <div class="form-group">

        <label class="btn btn-default btn-file">
           Browse <input type="file" name="image" style="display: none;">
        </label>
        {{$course->image}}
    </div>

    <div>
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    </div>
    {{  Form::hidden('_method', 'PUT' ) }}
    {!! Form::close() !!}
</div>
