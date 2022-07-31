@extends('template')

@section('title', 'Read ' . $task->title)

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
			<li><a href="/task">Task</a></li>
			<li>@yield('title')</li>
		</ol>
	</div>
</div>

{!! $pesan !!}

<div class="card">
	<div class="card-body">
		{!! $task->question !!}
	</div>
</div>

<?php if (Session::get('id_role')==3): ?>
	<?php if (date('d-m-Y H:i', strtotime($task->stop_at)) <= date('d-m-Y H:i')) { ?>
	<?php } elseif (date('d-m-Y H:i', strtotime($task->created_at)) <= date('d-m-Y H:i')) { 
		$answer = App\Models\Answer::where('id_student', $user->id)->where('id_task', $task->id)->count();
		if ($answer > 0) { ?>
			<div class="alert alert-primary">
				Anda sudah kirim jawaban
			</div>
		<?php } else { ?>
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Silahkan Kerjakan</h4>
					<small class="text-danger">Hanya bisa sekali kirim jawaban, harap periksa kembali jawaban anda!</small>
					<form action="/answer" method="post">
						@csrf
						<div class="form-group">
							<label>Jawaban</label>
							<textarea name="answer" class="form-control my-editor" rows="10"></textarea>
						</div>
						<input type="hidden" name="task" value="{{ $task->id }}">
						<div class="form-group">
							<button class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
			<script>
				var editor_config = {
					path_absolute : "/",
					selector: 'textarea.my-editor',
					relative_urls: false,
					height: 350,
					plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak"		],
					toolbar: "bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
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
		<?php } ?>
	<?php } else {
	}
	?>
<?php endif ?>

@endsection()