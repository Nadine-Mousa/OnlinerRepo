<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakenExam extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'exam_key',
    //     'student_id',
    //     'total_score',
    //     'created_at',
    //     'updated_at'
    // ];

    public function student(){
        return $this->belongsTo(User::class);
    }

}
