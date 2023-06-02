@extends('admin.layouts.app')
@section('title','Gallery')
@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <!-- Simple Datatable start -->
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix mb-20">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Property Gallery</h4>
                        </div>
                        <div class="pull-right">
                            <div class="pd-20">
                                <div class="row" style="margin-left: 3px;">
                                    <div id="filelist">
                                        <form method="post" id="galleryform">
                                            @csrf
                                        </form>
                                    </div>
                                    <div id="progressbar"></div>
                                    <br />
                                    <div class="form-group">
                                        <div id="container" class="gallary-btn">
                                            <a id="pickfiles" href="javascript:;" class="btn btn-primary">Upload Photo</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="data-table table stripe hover nowrap" id="GalleryTable">
                            <thead>
                                <tr>
                                    <th class="table-plus datatable-nosort">No</th>
                                    <th>File Name</th>
                                    <th>File Type</th>
                                    <th>Featured</th>
                                    <th class="datatable-nosort">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <!-- Simple Datatable End -->
            </div>
        </div>
    </div>
    @push('modals')
        <div class="modal fade bs-example-modal-lg" id="GalleryModel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content"></div>
            </div>
        </div>
        @endpush
@endsection
@section('scripts')
<script type="text/javascript">
    window.list = "{!! route('admin.property.galleries.index',$property_id) !!}";
</script>
<script src="{!! asset('js/galleries.js') !!}" type="text/javascript"></script>
<script src="{!! asset('js/plupload.full.min.js') !!}"></script>
<script type="text/javascript">
	var plupload_url = "{{ asset('plupload/upload.php') }}";
	var plupload_flash = "{{ asset('plupload/Moxie.swf') }}";
	var plupload_silverlight = "{{asset('plupload/Moxie.xap')}}";

	var uploader = new plupload.Uploader({
		        runtimes : 'html5,flash,silverlight,html4',
		        browse_button : 'pickfiles',
		        container: document.getElementById('container'),
		        url : plupload_url,
		        dragdrop: true,
		        chunk_size: '1mb',
		        filters : {
		        	max_file_size : '20mb',
		            mime_types: [
		  		    {title : "Image files", extensions : "jpg,png,jpeg"},
		  			{title : "Video files", extensions : "mp4,mkv"},
		        	]
		        },
		        flash_swf_url : plupload_flash,
		        silverlight_xap_url : plupload_silverlight,
		        init: {
		            PostInit: function() {
		            },
		            FilesAdded: function(up, files) {
		                uploader.start();
		                jQuery('.loader').fadeToggle('medium');
		            },
		            UploadProgress: function(up, file) {
					    $('#progressbar').fadeIn();
					    $('#progressbar').css('width', file.percent + '%');
					  },
		            UploadComplete: function(up, files){
		                jQuery.each(files,function(i,file){
		            		$("#galleryform").append('<input type="hidden" name="files['+i+'][file]" value="'+file.name+'" /> <input type="hidden" name="files['+i+'][type]" value="'+file.type+'" />');
		            	});
		            	$.ajax({
		            		type: "POST",
		            		url: "{!! route('admin.property.galleries.store',$property_id) !!}",
  							data: jQuery("form").serialize(),
  							success: function (data) {
					            // location.reload();
					        },
					        error: function (error) {
					            alert("Something went wrong, Please try again after sometime.");
					       		// location.reload();
					        }
		            	});
		            },
		            Error: function(up, err) {
		                alert(err.message);
		            }
		        }
		    });
		uploader.init();
</script>
@endsection
