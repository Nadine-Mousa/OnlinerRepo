<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempProfessor extends Model
{
    use HasFactory;
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function level(){
        return $this->belongsTo(Level::class);
    }
    protected $fillable = [

    'first_name',
    'last_name',
    "email",
    "password",
    "created_ae",
    "updated_at",
    "department_id",
    "level_id",
    "verified",
    "role",
    ];
}
