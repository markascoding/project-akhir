<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Journal extends Model
{
    use HasFactory;
    protected $table = 'journals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_teacher',
        'id_studyroom',
        'id_lesson',
        'jp_mulai',
        'jp_selesai',
        'status',
        'keterangan',
    ];

    /**
     * Get the user that owns the Journal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function studyroom(): BelongsTo
    {
        return $this->belongsTo(Studyroom::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }
}
