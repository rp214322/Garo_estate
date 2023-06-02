<form id="editable-form" action="{!! route('admin.users.update',array($user->id)) !!}" method="POST">
@csrf
@method('PATCH')
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">View User </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="modal_form">
  <div class="form-group">
      <lable>First Name</lable>
      <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="{!! $user->first_name !!}" readonly>
    </div>
    <div class="form-group">
      <lable>Last Name</lable>
      <input type="text" name="last_name" class="form-control" placeholder="Last Name" required value="{!! $user->last_name !!}" readonly>
    </div>
    <div class="form-group">
      <lable>Company Name</lable>
      <input type="text" name="company_name" class="form-control" placeholder="Company Name" required value="{!! $user->company_name !!}" readonly>
    </div>
    <div class="form-group">
      <lable>Phone</lable>
      <input type="number" name="phone" class="form-control" placeholder="Phone" required value="{!! $user->phone !!}" readonly>
    </div>
    <div class="form-group">
        <lable>Email</lable>
        <input type="email" name="email" class="form-control" placeholder="Name" required value="{!! $user->email !!}" readonly>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="users_{!! $user->id !!}">Save changes</a>
</div>
</form>
