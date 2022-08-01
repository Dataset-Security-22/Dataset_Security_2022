<?php

namespace App\Http\Controllers;

use App\Models\data;
use App\Models\DeskripsiRumah;
use Illuminate\Http\Request;

class ApiRumahController extends Controller
{
    public function index()
    {
        $data = DeskripsiRumah::all();
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function detail($id)
    {
        $data = DeskripsiRumah::find($id);
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function store(Request $request)
    {
        $data = DeskripsiRumah::create($request->all());
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function update(Request $request, $id)
    {
        $data = DeskripsiRumah::find($id);
        $data->update($request->all());
        return response()->json(['message' => 'Success', 'data' => $data]);
    }

    public function destroy($id)
    {
        $data = DeskripsiRumah::find($id);
        $data->delete();
        return response()->json(['message' => 'Success', 'data' => null]);
    }
}
