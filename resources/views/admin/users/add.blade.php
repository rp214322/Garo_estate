@section('title','User')
<form id="editable-form" action="{!! route('admin.users.store') !!}" method="POST">
@csrf
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Add User </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="modal_form">
    <div class="form-group">
      <lable>First Name</lable>
      <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
    </div>
    <div class="form-group">
      <lable>Last Name</lable>
      <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
    </div>
    <div class="form-group">
      <lable>Phone</lable>
      <input type="number" name="phone" class="form-control" placeholder="Phone" required>
    </div>
    <div class="form-group">
        <lable>email</lable>
        <input type="email" name="email" class="form-control" placeholder="Email" required email>
      </div>
      <div class="form-group">
        <lable>password</lable>
        <input type="password" name="password" class="form-control" placeholder="********" required>
      </div>
      <div class="form-group">
        <lable>Confirm Password</lable>
        <input type="password_confirmation" name="password_confirmation" class="form-control" placeholder="********" required>
      </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-type="users">Save changes</a>
</div>
</form>
