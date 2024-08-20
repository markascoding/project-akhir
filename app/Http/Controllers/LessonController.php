<?php

namespace App\Http\Controllers;

use App\Http\Requests\LessonRequest;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'lessons' => Lesson::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.lesson.index', $data);
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
    public function store(LessonRequest $request)
    {
        $data = $request->validated();
        Lesson::query()->create($data);
        return redirect()->route('lesson.index')->with('success', 'Data berhasil disimpan');
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
        $lesson = Lesson::query()->findOrFail($id);
        return response()->json($lesson);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LessonRequest $request, string $id)
    {
        $data = $request->validated();
        Lesson::query()->findOrFail($id)->update($data);
        return response()->json(['success' => 'Data berhasil diubah']);
        // return redirect()->route('lesson.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lesson::query()->findOrFail($id)->delete();
        return redirect()->route('lesson.index')->with('success', 'Data berhasil dihapus');
    }
}
