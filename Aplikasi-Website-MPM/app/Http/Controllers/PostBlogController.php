<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Model\PostBlog;
use App\Models\Model\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostBlogController extends Controller
{
	public function index()
	{
		$data = [
			"blog_post" => PostBlog::orderBy("title", "DESC")->get()
		];

		return view("/page/admin/post_blog/data_post_blog", $data);
	}

	public function form_tambah()
	{
		$data = [
			"data_kategori" => Kategori::orderBy("nama_kategori", "DESC")->get()
		];

		return view("/page/admin/post_blog/form_tambah", $data);
	}

	public function tambah(Request $request)
	{

		if ($request->file("gambar")) {
			$data = $request->file("gambar")->store("post-blog");
		}

		PostBlog::create([
			"id_kategori" => $request->id_kategori,
			"title" => $request->title,
			"slug" => Str::slug($request->title),
			"body" => $request->body,
			"tanggal_upload" => date("Y-m-d"),
			"tanggal_ubah_upload" => date("Y-m-d"),
			"gambar" => $data,
			"id_users" => Auth::user()->id
		]);

		return redirect("/page/admin/post_blog/")->with("sukses", "Data Berhasil di Tambahkan");
	}

	public function edit($id)
	{
		$data = [
			"edit" => PostBlog::where("id", $id)->first(),
			"data_kategori" => Kategori::orderBy("nama_kategori", "DESC")->get(),
			"data_post_blog" => PostBlog::where("id", "!=", $id)->get()
		];

		return view("/page/admin/post_blog/form_edit", $data);
	}

	public function simpan(Request $request)
	{
		if ($request->file("gambar")) {
			
			if ($request->oldImage) {
				Storage::delete($request->oldImage);
			}

			$data = $request->file("gambar")->store("post-blog");
		}

		PostBlog::where("id", $request->id)->update([
			"id_kategori" => $request->id_kategori,
			"title" => $request->title,
			"slug" => Str::slug($request->title),
			"body" => $request->body,
			"tanggal_ubah_upload" => date("Y-m-d"),
			"gambar" => $data,
			"id_users" => Auth::user()->id
		]);

		return redirect("/page/admin/post_blog/")->with("sukses", "Data Berhasil di Tambahkan");	
	}

	public function hapus(Request $request)
	{
		$catch = $request->id;

		$tampung = PostBlog::where("id", $catch)->first();

		Storage::delete($tampung->gambar);

		PostBlog::where("id", $request->id)->delete();

		return redirect()->back()->with("sukses", "Data Berhasil di Hapus");
	}
}
