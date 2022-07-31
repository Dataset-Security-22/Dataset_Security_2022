@extends("page.layouts.template")

@section("page_title", "404 Not Found")

@section("breadcrumb")

<div class="container-fluid">
	<div class="row mb-2">
		<div class="col-sm-6">
			<h1 class="m-0">404 Error Page</h1>
		</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item">
					<a href="{{ url('/page/admin/dashboard') }}"> Dashboard </a>
				</li>
				<li class="breadcrumb-item active">404 Error Page</li>
			</ol>
		</div>
	</div>
</div>

@endsection

@section("page_content")

<section class="content">
	<div class="error-page">
		<h2 class="headline text-warning"> 404</h2>

		<div class="error-content">
			<h3><i class="fa fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

			<p>
				We could not find the page you were looking for.
				Meanwhile, you may <a href="{{ url('/page/admin/dashboard') }}">return to dashboard</a> or try using the search form.
			</p>
		</div>
		<!-- /.error-content -->
	</div>
	<!-- /.error-page -->
</section>

@endsection