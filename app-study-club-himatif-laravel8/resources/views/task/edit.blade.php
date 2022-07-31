@extends('template')

@section('title', 'Edit Task ' . $task->title)

@section('content')

<div class="row bg-title">
	<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
		<h4 class="page-title">@yield('title')</h4>
	</div>
	<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
		<ol class="breadcrumb">
			<li><a href="/dashboard">Home</a></li>
			<li><a href="/task">Task</a></li>
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

<div class="row">
	<form action="/task/{{ $task->id }}" method="post">
		@csrf
		@method('put')
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label>Title</label>
						<input type="text" class="form-control" name="title" value="<?= old('title') ? old('title') : $task->title ?>" required>
					</div>
					<div class="form-group">
						<label>Question</label>
						<textarea name="question" class="form-control my-editor" rows="10">{!! $task->question !!}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card">
				<div class="card-body">
					<div class="form-group">
						<label>Start</label>
						<input type="text" class="form-control edit" name="start_at" value="{!! $task->created_at !!}" readonly>
						<small class="text-danger announ" style="display: none">Biarkan kosong jika tidak diubah</small>
					</div>
					<div class="form-group">
						<label>Stop</label>
						<input type="text" class="form-control edit" name="stop_at" value="{!! $task->stop_at !!}" readonly>
						<small class="text-danger announ" style="display: none">Biarkan kosong jika tidak diubah</small>
					</div>
					<button class="btn btn-success" type="submit">Simpan</button>
					<a href="/task" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
	let edit = document.getElementsByClassName('edit');
	let announ = document.getElementsByClassName("announ");

	for (let i = 0; i < edit.length; i++) {
		for (let a = 0; a < announ.length; a++) {
			edit[i].addEventListener('click', function () {
				edit[i].readOnly = false;
				edit[i].type = "datetime-local";
				announ[i].style.display = ""
			})
		}
	}

	var editor_config = {
		path_absolute : "/",
		selector: 'textarea.my-editor',
		relative_urls: false,
		height: 500,
		menubar: 'file edit insert format table help',
		plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars fullscreen",
		"insertdatetime media nonbreaking save table directionality",
		"emoticons template textpattern"
		],
		toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
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
				title : 'File Manager <?= $user->name ?>',
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