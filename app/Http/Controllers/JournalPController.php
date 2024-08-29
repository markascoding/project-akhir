<?php

namespace App\Http\Controllers;

use App\Http\Requests\JournalRequest;
use App\Models\Journal;
use Illuminate\Http\Request;

class JournalPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'journals' => Journal::query()->orderBy('id', 'desc')->get(),
        ];
        return view('piket.index', $data);
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
    public function store(JournalRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Journal::query()->create($data);
        return redirect()->route('piket.index')->with('success', 'Data Journal telah berhasil disimpan');
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
        $piket = Journal::query()->findOrFail($id);
        return response()->json($piket);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JournalRequest $request, string $id)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Journal::query()->where('id', $id)->update($data);
        return redirect()->route('journal.index')->with('success', 'Data Journal telah berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Journal::query()->where('id', $id)->delete();
        return redirect()->route('journal.index')->with('success', 'Data Journal telah berhasil dihapus');
    }
}
