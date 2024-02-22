<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["name","course"];
    use HasFactory;

    public function books(){
        return $this->hasMany(Books::class);
    }

    public function subjects(){
        return $this->hasMany(Subject::class);
    }
}
