<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentCase extends Model
{
    use HasFactory;

    public function civil_cases(){
        return $this->hasMany(CivilCase::class);
    }
    public function criminal_cases(){
        return $this->hasMany(CriminalCase::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
