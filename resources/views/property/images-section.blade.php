@push('styles')
<style>
	.dropzone{
		border: 3px dotted #ccc;
	}
	#propertyImages{
		background-color: #f5f5f5;
		margin: 15px auto;
		padding: 10px;
	}
	#propertyImages .img-wrap{
		position: relative;
		display: inline-block;
		margin: 0 10px 10px 0;
		background-color: #fff;
	}
	#propertyImages .img-wrap img{
		overflow: hidden;
		width: auto;
		width: 120px;
		height: 100px;
		border: 2px solid #eee;
	}
	#propertyImages .img-wrap .del-image-btn{
		position: absolute;
		top: 0;
		right: 0;
		border: 0;
		color: #fff;
		background-color: #ff4c4c;
		text-align: center;
		font-size: .8em;
	}
	#no-image{
		text-align: center;
		background-color: #fff;
		padding: 20px;
	}
	#no-image .image-icon{
		font-size: 72px;
		color: #a5a5a5;
	}
	#no-image .text{
		font-style: italic;
	}
</style>
@endpush
<div class="white p-3">
	<form id="myAwesomeDropzone" action="{{ route('propertyImages.store', $property->slug) }}" method="post" class="dropzone" enctype="form-data/multipart">
		@csrf
		<div class="fallback">
			<input name="file" type="file" multiple />
		</div>
		<div class="dz-default dz-message">
			<span><strong>Drag & Drop</strong> Property images here to upload or </span>
			<div class="my-3">
				<div class="btn btn-info z-depth-0">Browse Images</div>
			</div>
		</div>
		<input type="number" name="property_id" value="{{ $property->id }}" hidden="true">
		<div class="dropzone-previews"></div>
	</form>

	<div id="propertyImages"></div>
</div>

<script type="text/template" id="image-template">
	<div class="img-wrap">
		<img class="img-fluid" src="" alt="">
		<button class="del-image-btn" title="delete"><i class="fa fa-trash"></i></button>
	</div>
</script>
<script type="text/template" id="no-image-template">
	<div id="no-image">
		<div class="image-icon">
			<i class="far fa-image"></i>
		</div>
		<div class="text">
			<strong>OOPS !!</strong>
			No Images to show
		</text>
	</div>
</script>

@push('scripts')
<script>
	Dropzone.autoDiscover = false;
	$(function() {
		var images = $('#propertyImages');
		var imageTemplate = $('#image-template').html();
		var noImageTemplate = $('#no-image-template').html();
		var deleteUrl = '{{ route('property.deleteImage', 'IMAGE_ID') }}';

		function renderImageTemplate(image){
			var templateItem = $(imageTemplate);
			templateItem.find('img').attr('src', image.path);
			templateItem.find('.del-image-btn').attr('data-id', image.id)
			images.append(templateItem);
		}

		function renderNoImageTemplate(){
			images.append(noImageTemplate)
		}

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		function loadImages(){
			$.ajax('{{ route('propertyImages.list', $property->id) }}',
			{
				dataType: 'json',
				success: function (data,status,xhr) {
					// console.log(data);
					images.empty();
					console.log(typeof(data));
					if(jQuery.isEmptyObject(data)){
						renderNoImageTemplate();
					}else{
						data.forEach(function(image){
							renderImageTemplate(image);
						});
					}
				},
				error: function (jqXhr, textStatus, errorMessage) {
					console.log(errorMessage);
				}
			});
			console.log("Images Reloaded");
		}

		loadImages();

		var myAwesomeDropzone = new Dropzone("form#myAwesomeDropzone", {
			acceptedFiles: '.png,.jpg,.jpeg,.gif',
			previewsContainer: '.dropzone-previews',
			init: function () {
				var myDropzone = this;
				this.on("sendingmultiple", function() {
				});
				this.on("successmultiple", function(files, response) {
					console.log(response);
				});
				this.on("errormultiple", function(files, response) {
					console.log(response);
				});

				this.on('complete', function(file, response) {
					console.log('upload complete');
					this.removeFile(file);
					loadImages();
				});
			}
		});

		images.on('click', '.del-image-btn', function(e) {
			event.preventDefault();
			var con = confirm('Are you absolutely sure to delete this image?');
			if(con){
				var dummyUrl = deleteUrl;
				var imageDeleteUrl = dummyUrl.replace(/IMAGE_ID/, $(this).data('id'));
				console.log("requesting to " + imageDeleteUrl);
				$(this).hide();
				$.ajax({
					url: imageDeleteUrl,
					type: 'POST',
					data: {_method: 'delete'},
				})
				.done(function(response) {
					console.log("success");
				})
				.fail(function(response) {
					console.log("error");
				})
				.always(function() {
					loadImages();
					console.log("complete");
				});
				return false;
			}
			else{
				return false;
			}
		});

	});

</script>
@endpush
