<?php

namespace App\Models;

use App\Models\CV;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Technology extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cv(){
        return $this->belongsToMany(CV::class);
    }
}
