<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;
    public static function bgColor(){
        $colors = ["#C47AFF","#4649FF","#BCE29E","#9E7676","#FFD372","#FF74B1"];
        return $colors[array_rand($colors)];
    }
}
