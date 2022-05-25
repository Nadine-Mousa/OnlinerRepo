<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Level extends Model
{
    use HasFactory;
    protected $fillable = [
        'level_number',
        'created_at',
    ];

}
