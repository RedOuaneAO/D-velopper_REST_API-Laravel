<?php

namespace App\Models;

use App\Models\article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    
    // public function article(){
    //     return $this->belongsTo(article::class);
    // }
    public function articles()
    {
        return $this->hasMany(article::class);
    }
}
