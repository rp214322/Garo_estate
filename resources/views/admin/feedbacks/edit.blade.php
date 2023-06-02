<form id="editable-form" action="{!! route('admin.feedbacks.update',array($feedback->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Feedback </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
        <div class="form-group">
            <lable>User_id</lable>
            <select name="user_id" class="form-control" disabled>
              @foreach (App\Models\User::pluck('first_name','id') as $key => $user)
              <option value="{{ $key }}" {!! $key == $feedback->user_id ? 'selected' : '' !!}>{{ $user }}</option>
              @endforeach
            </select>
          </div>
        <div class="form-group">
          <lable>Rating</lable>
          <input type="text" name="rating" class="form-control" placeholder="rating" value="{!! $feedback->rating !!}" required readonly>
        </div>
        <div class="form-group">
            <lable>Descriptrion</lable>
            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="description" required readonly>{{ $feedback->description }}</textarea>
        </div>
        <div class="form-group">
            <lable>Status</lable>
            <select name="status" class="form-control">
                <option value="1" {{ $feedback->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$feedback->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="feedbacks_{!! $feedback->id !!}">Save changes</a>
    </div>
    </form>
