<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudyRoomRequest;
use Illuminate\Http\Request;
use App\Models\Studyroom;

class StudyRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'studyrooms' => Studyroom::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.studyroom.index', $data);

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
    public function store(StudyRoomRequest $request)
    {
        $data = $request->validated();
        Studyroom::query()->create($data);
        return redirect()->route('studyroom.index')->with('success', 'Data berhasil disimpan');
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
        $studyroom = Studyroom::query()->findOrFail($id);
        return response()->json($studyroom);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudyRoomRequest $request, string $id)
    {
        $data = $request->validated();
        Studyroom::query()->findOrFail($id)->update($data);
        return response()->json(['success' => 'Data berhasil diubah']);
        // return redirect()->route('studyroom.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Studyroom::query()->findOrFail($id)->delete();
        return redirect()->route('studyroom.index')->with('success', 'Data berhasil dihapus');
    }
}
