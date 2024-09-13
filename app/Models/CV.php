<?php

namespace App\Models;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CV extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function technologies(){
        return $this->belongsToMany(Technology::class, 'cv_technologies');
    }
}
