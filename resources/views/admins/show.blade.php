<div class="row">
  <div class="">
    <div>
      <ul class="list-group list-group-flush list-unstyled">
        <li class="list-group-item" style="height:60px;">
          <a class="btn btn-warning edit_admin edit_btn" data-user-id="{{$user->id}}">
            <i class="fa fa-pencil"></i>
          </a>
          <a class="btn btn-default delete_admin delete_btn" data-user-id="{{$user->id}}" data-toggle="modal" data-target="#usersModal{{$user->id}}">
            <i class="fa fa-trash-o"></i>
          </a>
        </li>
        <li class="list-group-item">
          <div class="text-center">
            <img src="storage/images/admins/{{$user->image}}" alt="" width="250" height="250" />
          </div>
        </li>
        <li class="list-group-item">
          <h3><span class="badge-primary badge_name">{{$user->name}}</span></h3>
          <h3><span class="badge badge-primary badge_color">Role: {{$user->role_id}}</span></h3>
        </li>
        <li class="list-group-item">
          <h3><span class="badge badge-primary"> {{$user->email}}</span></h3>
          <h3><span class="badge badge-primary"> {{$user->phone}}</span></h3>
        </li>
      </ul>
    </div>
  </div>
</div>
