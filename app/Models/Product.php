<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $fillable =['name','image','slug','brand','cost_of_good','status','trending','title',
                'price','keyword','short_description','description','category_id','quantity','color'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function color(){
        return $this->belongsTo(Color::class,'color_id','id');
    }
}
