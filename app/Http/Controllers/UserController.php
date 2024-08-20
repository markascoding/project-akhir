<?php

namespace App\Http\Controllers;

use App\Models\User;
<<<<<<< HEAD
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
=======
use Illuminate\Http\Request;
>>>>>>> f67341acf53e570c5ff263354efecd6356bb75b5

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
<<<<<<< HEAD
            "users" => User::query()->orderBy('id', 'desc')->get(),
            "teachers" => Teacher::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.akunPiket.index', $data);
=======
            'users' => User::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.user.index', $data);
>>>>>>> f67341acf53e570c5ff263354efecd6356bb75b5
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
    public function store(Request $request)
    {
<<<<<<< HEAD
        $name = $request->name;
        // cari data guru di tabel teacher
        $cariData = Teacher::query()->where('nama_guru', $name)->first();
        // ambil email dari data guru
        $email = $cariData->email;

        $password = Hash::make('123456');
        $role = $request->role;
        // dd($role);
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
        ]);
        dd($user);
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan');
=======
        //
>>>>>>> f67341acf53e570c5ff263354efecd6356bb75b5
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
