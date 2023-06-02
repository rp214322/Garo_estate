<form id="editable-form" action="{!! route('admin.amenities.update',array($amenity->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Amenity </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
          <lable>Amenities</lable>
          <input type="text" name="name" class="form-control" placeholder="Amenity" value="{!! $amenity->name !!}" required>
        </div>
        <div class="form-group">
            <lable>Status</lable>
            <select name="status" class="form-control">
                <option value="1" {{ $amenity->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$amenity->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="amenities_{!! $amenity->id !!}">Save changes</a>
    </div>
    </form>
