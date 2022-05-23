<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    protected $fillable = [
        'subject_name',
        'subject_description',
        "chapter_count",
        "created_at",
        "department_id",
        "level_id"


    ];

}


