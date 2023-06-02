<form id="editable-form" action="{!! route('admin.areas.store') !!}" method="POST">
    @csrf
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Add Area </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
          <lable>Area</lable>
          <input type="text" name="area" class="form-control" placeholder="area" required>
        </div>
        <div class="form-group">
            <lable>Pincode</lable>
            <input type="text" name="pincode" class="form-control" placeholder="pincode" required>
          </div>
        <div class="form-group">
            <lable>Status</lable>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-type="areas">Save changes</a>
    </div>
    </form>
