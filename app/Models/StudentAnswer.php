<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentAnswer extends Model
{
    use HasFactory;

    public $timestamps = false;
    public function option(){
        return $this->belongsTo(Option::class);
    }
    public function question(){
        return $this->belongsTo(Question::class);
    }

}
