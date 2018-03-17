@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-6">
    <h2><a href="#" class="add_admin_btn btn btn-primary btn-circle"><i class="glyphicon glyphicon-plus"></i></a>
            Admins</h2>
            @if(count($users) > 0 )
            @foreach($users as $user )
    <div class="show_admin_info card" data-id="{{$user->id}}">
      <div class="card-img-top">
      </div>
      <div class="card-body">
        <div class="card-title">
          <img src="storage/images/admins/{{$user->image}}" alt="" width="150" height="150">
          {{$user->name}}
        </br>
        Role:
          {{$user->role_id}}
        </div>
      </div>
    </div>
    @endforeach @endif
  </div>
  <div class="col-md-6">
    <div class="row">
      <div class="col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
  <div class="col-md-6" id="details_container">
    <div class="row">
      <div class="panel panel-default">
        @include('inc.adminStatus')
      </div>
      <div class="panel panel-default" id="create_admin_form" style="display: none;">
        @include('admins.create')
      </div>
      @if(count($users) > 0 )
        @foreach($users as $user )
      <div class="panel panel-default" id="edit_admin_form_{{$user->id}}" style="display: none;">
        <div class="panel-heading">
          Edit Admin
        </div>
        @include('admins.edit')
      </div>
      @endforeach
      @endif
      @if(count($users) > 0 ) @foreach($users as $user )
      <div class="panel panel-default size_panel" id="admin_info_{{$user->id}}" style="display: none;" width="700" height="500">
        @include('admins.show')
      </div>
      <!-- The Modal -->
      <div class="modal fade" id="usersModal{{$user->id}}">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Delete This User</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              Press this button to delete
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">

              @include('admins.delete')
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
