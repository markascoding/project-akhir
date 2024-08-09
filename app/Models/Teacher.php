<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nip',
        'nama_guru',
        'email',
        'password',
        'role',
        'status',
    ];
}
