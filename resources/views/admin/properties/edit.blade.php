<form id="editable-form" action="{!! route('admin.properties.update',array($property->id)) !!}" method="POST">
    @csrf
    @method('PATCH')
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Edit Details </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="modal_form">
      <div class="form-group">
        <label>Category</label>
        <select name="category_id" id="CategoryId" class="form-control" required>
            <option value="">Select</option>
            @foreach (App\Models\Category::pluck('name','id')->toArray() as $id => $name)
                <option value="{!! $id !!}" {!! $id == $property->category_id ? 'selected' : '' !!}>{!! $name !!}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{!! $property->title !!}" placeholder="Title" required>
      </div> <div class="form-group">
        <label>Address</label>
        <textarea name="address" class="form-control" placeholder="address">{!! $property->address !!}</textarea>
    </div> <div class="form-group">
        <label>Area</label>
        <select name="area_id" id="AreaId" class="form-control" required>
            <option value="">Select</option>
            @foreach (App\Models\Area::pluck('area','id')->toArray() as $id => $area)
                <option value="{!! $id !!}" {!! $id == $property->area_id ? 'selected' : '' !!}>{!! $area !!}</option>
            @endforeach
        </select>
    </div> <div class="form-group">
        <label>Sq_ft</label>
        <input type="text" name="sq_ft" class="form-control" value="{{ $property->sq_ft }}" placeholder="sq_ft" required>
    </div> <div class="form-group">
        <label>Price</label>
        <input type="text" name="price" class="form-control" value="{{ $property->price }}" placeholder="price" required>
    </div> <div class="form-group">
        <label>BHK</label>
        <select name="bhk" id="bhk" class="form-control" required>
            <option value="">Select BHK</option>
            @foreach (App\Models\Property::$bhk as $key => $value)
            <option value="{!! $key !!}" {!! $key == $property->bhk ? 'selected' : '' !!}>{!! $value !!}</option>
            @endforeach
        </select>
    </div> <div class="form-group">
        <label>Bathrooms</label>
        <select name="bathrooms" id="bathrooms" class="form-control" required>
            <option value="">Select numbers of bathrooms</option>
            @foreach (App\Models\Property::$bathrooms as $key => $value)
            <option value="{!! $key !!}" {!! $key == $property->bathrooms ? 'selected' : '' !!}>{!! $value !!}</option>
            @endforeach
        </select>
    </div> <div class="form-group">
        <label>Description</label>
        <textarea name="description" class="form-control" placeholder="description">{!! $property->description !!}</textarea>
    </div> <div class="form-group">
        <label>Amenities</label>
        <select name="amenities[]" id="amenities" class="form-control" multiple required>
            @foreach (App\Models\Amenity::pluck('name','id')->toArray() as $id => $name )
                    <option value="{{ $name }}" {{ in_array($name,$property->amenities) ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach
        </select>
    </div>
    </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-id="properties_{!! $property->id !!}">Save changes</a>
    </div>
    </form>
    <script>
        var options = {
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
            allowedContent:true
        };
        $(document).ready(function() {
            var editor = CKEDITOR.replace( 'description',options);
        });
        </script>
