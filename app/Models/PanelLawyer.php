<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanelLawyer extends Model
{
    use HasFactory;

    public function cases(){
        return $this->hasMany(ParentCase::class);
    }
}
