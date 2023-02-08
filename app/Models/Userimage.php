<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;


class Userimage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'user_image_path'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
