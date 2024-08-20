<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studyroom extends Model
{
    use HasFactory;

    protected $table = 'studyrooms';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kelas',];
}
