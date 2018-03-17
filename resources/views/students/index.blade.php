<div class="show_student_info card" data-id="{{$student->id}}">

    <div class="card-img-top">
        <img src="storage/images/students/{{$student->image}}" alt="" width="150" height="150" >
    </div>
    <div class="card-body">
      <div class="card-title">
          {{$student->name}}
        </br>
          {{$student->phone}}
      </ul>
      </div>
    </div>
</div>
