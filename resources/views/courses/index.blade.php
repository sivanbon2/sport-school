<div class="show_course_info card" data-id="{{$course->id}}">

    <div class="card-img-top">
        <img src="storage/images/courses/{{$course->image}}" alt="" width="150" height="150" >
    </div>
    <div class="card-body">
      <div class="card-title">
        {{$course->course_name}}
      </br>
        {{$course->price}}
      </div>
    </div>
</div>
