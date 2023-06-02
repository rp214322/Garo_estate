<form id="editable-form" action="{!! route('admin.properties.store') !!}" method="POST">
    @csrf
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Add Detail </h5>
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
                    <option value="{!! $id !!}">{!! $name !!}</option>
                @endforeach
            </select>
        </div><div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
        </div><div class="form-group">
            <label>Address</label>
            <textarea name="address" class="form-control" placeholder="address" required></textarea>
        </div><div class="form-group">
            <label>Area</label>
            <select name="area_id" id="areaId" class="form-control" required>
                <option value="">Select</option>
                @foreach (App\Models\Area::pluck('area','id')->toArray() as $id => $area)
                    <option value="{!! $id !!}">{!! $area !!}</option>
                @endforeach
            </select>
        </div><div class="form-group">
            <label>Sq_ft</label>
            <input type="text" name="sq_ft" class="form-control" placeholder="sq_ft" required>
        </div><div class="form-group">
            <label>Price</label>
            <input type="text" name="price" class="form-control" placeholder="Price" required>
        </div><div class="form-group">
            <label>BHK</label>
            <select name="bhk" id="bhk" class="form-control" required>
                <option>Select BHK</option>
                @foreach (App\Models\Property::$bhk as $key =>$value )
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div><div class="form-group">
            <label>Bathrooms</label>
            <select name="bathrooms" id="bathrooms" class="form-control" required>
                <option>Select Numbers of Bathrooms</option>
                @foreach (App\Models\Property::$bathrooms as $key =>$value )
                    <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div><div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" placeholder="description"></textarea>
        </div><div class="form-group">
            <label>Amenities</label>
            <select name="amenities[]" id="amenities" class="form-control" multiple required>
                @foreach (App\Models\Amenity::pluck('name','id')->toArray() as $id => $name )
                    <option value="{{ $name }}">{{ $name }}</option>
                @endforeach
            </select>
    </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <a href="javascript:;" type="submit" class="btn btn-primary btn-submit" data-type="details">Save changes</a>
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
