<?php

namespace App\Models;

use App\Models\article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'type',
        'id_Admin'
    ];
    public function article(){
        return $this->belongsToMany(article::class);
    }
}
