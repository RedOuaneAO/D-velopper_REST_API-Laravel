<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commantaire extends Model
{
    use HasFactory;
    protected $fillable=[
        'comment',
        'id_user',
        'id_user',
        'id_article'
    ];
}
