<div class="panel-body">
    {!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST', 'enctype' => "multipart/form-data"]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Student name', ['class' => 'control-label']) !!}
        {!! Form::text('name', $student->name, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('E-mail', 'email', ['class' => 'control-label']) !!}
        {!! Form::text('email', $student->email, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Phone', 'Phone', ['class' => 'control-label']) !!}
        {!! Form::text('phone', $student->phone, ['class' => 'form-control', 'required']) !!}
    </div>
    <div class="form-group">
        <label class="btn btn-default btn-file">
           Browse <input type="file" name="image" style="display: none;">
        </label>
            {{$student->image}}
    </div>
    <div class="form-group">

              @foreach($courses as $course )
                  @php
                      $is_registered = false
                  @endphp
                  @if(count($student->courses) > 0 )
                      @foreach($student->courses as $student_course )
                          @if( $course->id ===  $student_course->id )
                              @php
                              $is_registered = true
                              @endphp
                          @endif
                      @endforeach
                  @endif
                  {{Form::label( 'courses', $course->course_name)}}
                  {{Form::checkbox( 'courses[]', $course->id, $is_registered)}}
              @endforeach
    </div>
    <div>
        {!! Form::submit('Edit', ['class' => 'btn btn-primary']) !!}
    </div>
    {{  Form::hidden('_method', 'PUT' ) }}
    {!! Form::close() !!}
</div>
