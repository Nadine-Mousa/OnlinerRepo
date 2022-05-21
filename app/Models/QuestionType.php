<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class QuestionType extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'type_name',

    ];

    // public function questions()
    // {
    //     return $this->hasMany(Question::class);
    // }
    
    // public function question(): HasMany
    // {
    //     return $this->hasMany(SingleChoiceQuestion::class);
    // }
    
}
