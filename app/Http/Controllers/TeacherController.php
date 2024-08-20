<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'teachers' => Teacher::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeacherRequest $request)
    {

        $data = $request->validated();
        Teacher::query()->create($data);
        return redirect()->route('teacher.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::query()->findOrFail($id);
        return response()->json($teacher);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeacherRequest $request, string $id)
    {
        $data = $request->validated();
        Teacher::query()->findOrFail($id)->update($data);
        return response()->json(['message' => 'Data berhasil diubah']);
        // return redirect()->route('teacher.index')->with('success', 'Data berhasil diubah');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::query()->findOrFail($id)->delete();
        return redirect()->route('teacher.index')->with('success', 'Data berhasil dihapus');
    }
}
