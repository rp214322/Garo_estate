<form id="editable-form" action="{!! route('admin.areas.update',array($area->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Area </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
          <lable>Area</lable>
          <input type="text" name="area" class="form-control" placeholder="area" value="{!! $area->area !!}" required>
        </div>
        <div class="form-group">
            <lable>Pincode</lable>
            <input type="text" name="pincode" class="form-control" placeholder="pincode" value="{!! $area->pincode !!}" required>
          </div>
        <div class="form-group">
            <lable>Status</lable>
            <select name="status" class="form-control">
                <option value="1" {{ $area->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$area->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="areas_{!! $area->id !!}">Save changes</a>
    </div>
    </form>
