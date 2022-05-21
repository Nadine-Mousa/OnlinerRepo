<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
   // protected $dates=['deleted_at'];
    protected $fillable = [
        'subject_id',
        'title',
        'chapeter_number',
        'marks',
        'difficulty',
        'question_type'
    ];


    public function type(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class, 'question_type');  // foreing key in Question table
    }

    public function question_difficulty(): BelongsTo
    {
        return $this->belongsTo(Difficulty::class, 'difficulty');
    }
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'chapeter_number');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function options(){
        return $this->hasMany(Option::Class);
    }
}
