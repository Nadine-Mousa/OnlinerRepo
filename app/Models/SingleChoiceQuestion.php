<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class SingleChoiceQuestion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates=['deleted_at'];
    protected $fillable = [
        'title',
        'depart_id',
        'level_id',
        'subject_id',
        'chapter_number',
        'question_type',
        'difficulty',
        'option_one',
        'option_two',
        'option_three',
        'option_four',
        'answer',
        'marks'

    ];
    
    public function question_type(): BelongsTo
    {
        return $this->belongsTo(QuestionType::class);
    }
  
}
