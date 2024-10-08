<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "users" => User::query()->orderBy('id', 'desc')->get(),
            "teachers" => Teacher::query()->orderBy('id', 'desc')->get(),
        ];
        return view('admin.akunPiket.index', $data);
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
        $name = $request->name;
        // cari data guru di tabel teacher
        $cariData = Teacher::query()->where('nama_guru', $name)->first();
        // ambil email dari data guru
        $email = $cariData->email;

        // cek apakah email sudah ada di database
        $user = User::query()->where('email', $email)->first();
        // jika sudah ada, tampilkan pesan error
        if ($user) {
            return redirect()->route('user.index')->with('error', 'Akun sudah ada');
        };

        $password = Hash::make('123456');
        $role = $request->role;
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' =>  $role,
        ]);
        return redirect()->route('user.index')->with('success', 'Data berhasil disimpan');
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
        $user = User::query()->where('id', $id)->first();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data berhasil dihapus');
    }
}
