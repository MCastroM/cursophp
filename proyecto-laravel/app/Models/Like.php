<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    // Relación Many to One
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');

    }

    // Relación Many to One
    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id');

    }

}
