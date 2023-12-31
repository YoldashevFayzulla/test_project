<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =['name','desc','view','like','image'];

    public function category(){
        return $this->belongsTo(Category::class ,'category_id','id');
    }
    public function categories(){
        return Category::all()->get();
    }

}
