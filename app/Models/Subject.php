<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject_name',
        'subject_description',
        'chapter_count',
        'department_id',
        'level_id'


    ];
    public function sub_department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id' );
    }
    public function subject_level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
   

}


