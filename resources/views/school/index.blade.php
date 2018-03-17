  @extends('layouts.app')
  @section('content')
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <h2><a href="#" class="add_student_btn btn btn-primary btn-circle"><i class="glyphicon glyphicon-plus"></i></a>
        Students</h2>
        @if(count($students) > 0 )
          @foreach($students as $student )
            @include('students.index')
         @endforeach
        @endif
        </div>
        <div class="col-md-6">
          <h2>
            @if( $role == 'owner' || $role == 'manager' )
            <a href="#" class="add_course_btn btn btn-primary btn-circle"><i class="glyphicon glyphicon-plus"></i></a>
            @endif
        Courses</h2>
         @if(count($courses) > 0 )
         @foreach($courses as $course )
         @include('courses.index')
         @endforeach
         @endif
        </div>
      </div>
    </div>
    <div class="col-md-6" id='details_container'>
      <div class="row">
        <div class="col-md-12">
          @include('inc.schoolStatus')
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <div class="panel panel-default" id="create_student_form" style="display: none;">
          @include('students.create')
        </div>

        <div class="panel panel-default" id="create_course_form" style="display: none;">
          @include('courses.create')
        </div>

        @if(count($students) > 0 )
          @foreach($students as $student )
        <div class="panel panel-default" id="edit_student_form_{{$student->id}}" style="display: none;">
          <div class="panel-heading">
            Edit Student
          </div>
          @include('students.edit')
        </div>
        @endforeach
        @endif

        @if(count($courses) > 0 )
        @foreach($courses as $course )
        <div class="panel panel-default" id="edit_course_form_{{$course->id}}" style="display: none;">
          <div class="panel-heading">
            Edit Course
          </div>
          @include('courses.edit')
        </div>
        @endforeach
        @endif
        @if(count($students) > 0 )
        @foreach($students as $student )
        <div class="panel panel-default size_panel" id="student_info_{{$student->id}}" style="display: none;" width="700" height="500">
          <div class="row">
            <div class="">
              <div>
                <ul class="list-group list-group-flush list-unstyled">
                  <li class="list-group-item" style="height:60px;">
                    <a class="btn btn-warning edit_student edit_btn" data-student-id="{{$student->id}}">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-default delete_student delete_btn" data-student-id="{{$student->id}}" data-toggle="modal" data-target="#studentModal{{$student->id}}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  </li>
                  <li class="list-group-item">
                    <div class="text-center">
                      <img src="storage/images/students/{{$student->image}}" alt="" width="250" height="250" />
                    </div>
                  </li>
                  <li class="list-group-item">
                    <h3><span class="badge-primary badge_name">{{$student->name}}</span></h3>
                  </li>
                  <li class="list-group-item">
                    <h3><span class="badge badge-primary"> {{$student->email}}</span></h3>
                    <h3><span class="badge badge-primary"> {{$student->phone}}</span></h3>
                  </li>
                  @if(count($student->courses) > 0 )
                  <li class="list-group-item">
                    <div class="text-center">
                      <p class="badge badge-danger" style="background-color:blue; margin-top:10px;">Courses:</p>
                    </div>
                    @foreach($student->courses as $course )
                    <div class="text-center">
                      <p> {{ $course->course_name }}</p>
                    </div>
                    @endforeach
                    @else
                    <li class="list-group-item">
                      <p class="card-text text-left alert alert-info">
                        <span><i class="fa fa-exclamation-circle mr-2"></i></span><span>This student does not have courses right now<span></p>
                    </li>
                    </li>
                    @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="studentModal{{$student->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Delete This Student</h4>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                Press this button to delete
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                 @include('students.delete')
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @endif
        @if(count($courses) > 0 )
        @foreach($courses as $course )
        <div class="panel panel-default size_panel" id="course_info_{{$course->id}}" style="display: none;" width="700" height="500">
          <div class="row">
            <div class="">
              <div>
                <ul class="list-group list-group-flush list-unstyled">
                  <li class="list-group-item" style="height:60px;">
                    @if( $role == 'owner' || $role == 'manager' )
                    <a class=" btn btn-warning  edit_course edit_btn" data-course-id="{{$course->id}}">
                      <i class="fa fa-pencil"></i>
                    </a>
                    @endif
                    @if( $role == 'owner' || $role == 'manager' )
                    <a class="btn btn-default delete_course delete_btn" data-course-id="{{$course->id}}" data-toggle="modal" data-target="#courseModal{{$course->id}}">
                      <i class="fa fa-trash-o"></i>
                    </a>
                    @endif
                  </li>
                  <li class="list-group-item">
                    <div class="text-center">
                      <img src="storage/images/courses/{{$course->image}}" alt="" width="250" height="250" />
                    </div>
                  </li>
                  <li class="list-group-item">
                    <h3><span class="badge-primary badge_name">{{$course->course_name}}</span></h3>
                    <h3><span class="badge badge-primary"> {{$course->price}}</span></h3>
                  </li>
                  <li class="list-group-item">
                    <h5 style="font-weight: bold; text-decoration: underline; text-align:center;">Course Description:</h5>
                    <p style="word-break: break-all;">{{$course->description}}</p>
                  </li>
                  @if(count($course->students) > 0 )
                  <li class="list-group-item">
                    <div class="text-center">
                      <p class="badge badge-danger" style="background-color:blue; margin-top:10px;">Students:</p>
                    </div>

                    @foreach($course->students as $student )
                    <div class="text-center">
                      <p> {{ $student->name }}</p>
                    </div>
                    @endforeach
                    @else
                    <li class="list-group-item">
                      <p class="card-text text-left alert alert-info"><span>
                      <i class="fa fa-exclamation-circle mr-2"></i></span><span>This course does not have students right now</span></p>
                    </li>
                  </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- The Modal -->
        <div class="modal fade" id="courseModal{{$course->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Delete This Course</h4>
              </div>
              <!-- Modal body -->
              <div class="modal-body">
                Press this button to delete
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">

                @include('courses.delete')

              </div>
            </div>
          </div>
        </div>
        @endforeach
         @endif
      </div>
    </div>
  </div>
@endsection
