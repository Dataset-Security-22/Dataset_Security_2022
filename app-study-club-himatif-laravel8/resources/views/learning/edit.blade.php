@extends('template')

@section('title', 'Edit ' . $learning->title)

@section('content')

<style>
	.edit-mode {
		border: 1px solid black;
	}
</style>

<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">@yield('title')</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li><a href="/learning">Learning</a></li>
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="card">
	<div class="card-body">
		<form action="/learning/{{ $learning->id }}" method="post">
			@csrf
			@method('patch')
			<div class="form-group">
				<label>Title</label>
				<input type="text" class="form-control" name="title" value="<?= old('title') ? old('title') : $learning->title ?>" required>
			</div>
			<div class="form-group">
				<label>Material</label>
				<textarea name="material" class="form-control my-editor" rows="10">{!! $learning->material !!}</textarea>
			</div>
			<button class="btn btn-success" type="submit">Simpan</button>
			<a href="/learning" class="btn btn-danger">Batal</a>
		</form>
	</div>
</div>

<script>
	var editor_config = {
		path_absolute : "/",
		selector: 'textarea.my-editor',
		relative_urls: false,
		height: 500,
		menubar: 'file edit insert format table help',
		plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table directionality",
		"emoticons template textpattern"
		],
		toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
		file_picker_callback : function(callback, value, meta) {
			var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
			var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

			var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
			if (meta.filetype == 'image') {
				cmsURL = cmsURL + "&type=Images";
			} else {
				cmsURL = cmsURL + "&type=Files";
			}

			tinyMCE.activeEditor.windowManager.openUrl({
				url : cmsURL,
				title : 'File Manager <?= $learning->lecturer->name ?>',
				width : x * 0.8,
				height : y * 0.8,
				resizable : "yes",
				close_previous : "no",
				onMessage: (api, message) => {
					callback(message.content);
				}
			});
		}
	};

	tinymce.init(editor_config);
</script>

@endsection()