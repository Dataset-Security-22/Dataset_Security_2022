<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Task_view;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('email', Session::get('email'))->first();
        if (Session::get('id_role')==1) {
            $task = Task::latest()->get();
            return view('task.admin', compact('task'));
        } elseif (Session::get('id_role')==2) {
            $task = Task::where('id_lecturer', $user->id)->latest()->get();
            return view('task.lecturer', compact('task', 'user'));
        } else {
            $task = Task::where('id_category', $user->id_category)->latest()->get();
            return view('task.student', compact('user', 'task'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::where('email', Session::get('email'))->first();
        return view('task.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::where('email', Session::get('email'))->first();

        $request->validate([
            'title' => 'required|unique:tasks,title',
            'question' => 'required',
            'start_at' => 'required',
            'stop_at' => 'required',
        ]);

        Task::create([
            'id_lecturer' => $user->id,
            'id_category' => $user->id_category,
            'title' => htmlspecialchars($request->title),
            'slug' => Str::slug($request->title, '-'),
            'question' => $request->question,
            'stop_at' => $request->stop_at,
            'created_at' => $request->start_at,
        ]);

        return redirect('/task')->with('message', "<script>swal('Selamat!', 'Selamat tugas anda berhasil dibuat!', 'success');</script>");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('email', Session::get('email'))->first();
        $task = Task::where('slug', $slug)->first();
        if ($task) {
            if (date('d-m-Y H:i', strtotime($task->stop_at)) <= date('d-m-Y H:i')) {
                $pesan = '<div class="alert alert-danger">Tugas sudah ditutup</div>';
            } elseif (date('d-m-Y H:i', strtotime($task->created_at)) <= date('d-m-Y H:i')) {
                $pesan = '<div class="alert alert-success">Tugas sedang berjalan</div>';   
            } else {
                $pesan = '<div class="alert alert-warning">Tugas belum dibuka</div>';   
            }

            if (Session::get('id_role')==3) {
                $taskView = Task_view::where('id_student', $user->id)->where('id_task', $task->id)->count();

                if ($taskView < 1) {
                    Task_view::create([
                        'id_student' => $user->id,
                        'id_task' => $task->id
                    ]);

                    User::where('email', Session::get('email'))->update(['skor' => $user->skor + 5]);
                }

            }
            return view('task.show', compact('task', 'user', 'pesan'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $user = User::where('email', Session::get('email'))->first();
        $task = Task::where('slug', $slug)->first();
        if ($task) {
            return view('task.edit', compact('task', 'user'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Task::where('id', $id)->update([
            'title' => htmlspecialchars($request->title),
            'slug' => Str::slug($request->title, '-'),
            'question' => $request->question,
            'stop_at' => $request->stop_at,
            'created_at' => $request->start_at,
        ]);

        return redirect('/task')->with('message', "<script>swal('Selamat!', 'Selamat tugas anda berhasil diupdate!', 'success');</script>");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $task = Task::where('slug', $slug)->first();

        Task::destroy($task->id);

        return redirect('/task')->with('message', "<script>swal('Selamat!', 'Selamat tugas anda berhasil dihapus!', 'success');</script>");
    }
}
