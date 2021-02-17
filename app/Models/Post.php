<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];
    //bubsqueda por id title y bodt
    public static function search($search){
        return empty($search) ? static::query()
        :static::where('id','like', '%'.$search.'%')
        ->orwhere('title','like', '%'.$search.'%')
        ->orwhere('body','like', '%'.$search.'%');
    }
}
