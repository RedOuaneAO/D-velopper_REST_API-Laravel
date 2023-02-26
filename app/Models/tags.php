<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $fillable = [
        'tag',
        'id_Admin'
    ];
    public function Articles(){
        return $this->belongsToMany(article::class,'have_tags','id_Article','id_tag');
    }
}
