<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected function option(){
        return $this->belongsTo(Option::class);
    }
}
