<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = ["title", "student_id"];
    use HasFactory;

    public function student(){
        return $this->belongsTo(Student::class);
    }
}
