<form id="editable-form" action="{!! route('admin.categories.store') !!}" method="POST">
@csrf
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLongTitle">Add Category </h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
  <div class="modal_form">
    <div class="form-group">
      <lable>Category</lable>
      <input type="text" name="name" class="form-control" placeholder="Category" required>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-type="categories">Save changes</a>
</div>
</form>
