<form id="editable-form" action="{!! route('admin.inquiries.update',array($inquiry->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Inquiry </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
          <lable>User_id</lable>
          <select name="user_id" class="form-control" required disabled>
            @foreach (App\Models\User::pluck('first_name','id') as $key => $user)
            <option value="{{ $key }}" {!! $key == $inquiry->user_id ? 'selected' : '' !!}>{{ $user }}</option>

            @endforeach
          </select>
        </div>
        <div class="form-group">
            <lable>Property</lable>
            <input type="number" name="property" class="form-control" placeholder="property" value="{!! $inquiry->property_id !!}" required readonly>
        </div>
        <div class="form-group">
            <lable>Title</lable>
            <input type="text" name="title" class="form-control" placeholder="title" value="{{ $inquiry->title }}" required readonly>
        </div>
        <div class="form-group">
            <lable>Description</lable>
            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description" required readonly>{{ $inquiry->description }}</textarea>
        </div>
        <div class="form-group">
            <lable>Status</lable>
            <select name="status" class="form-control">
                <option value="0" >InActive</option>
                <option value="1" {{ $inquiry->status ? 'selected' : '' }}>Active</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="inquiries_{!! $inquiry->id !!}">Save changes</a>
    </div>
    </form>
