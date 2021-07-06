<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalCase extends Model
{
    use HasFactory;
    public function parent_case(){
        return $this->belongsTo(ParentCase::class);
    }
}
