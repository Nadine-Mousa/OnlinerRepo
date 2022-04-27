<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TakenExam extends Model
{
    use HasFactory;



   
    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }

   
    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id' );
    }




}
