<div class="col-sm-4 column">
    {!! Form::open(['action' => ['CoursesController@destroy', $course->id ], 'method' => 'POST']) !!}
    {{  Form::submit('Delete', ['class' => 'btn btn-danger' ]) }}
    {!! Form::hidden( '_method', 'DELETE' ) !!}
    {!! Form::close() !!}
</div>
