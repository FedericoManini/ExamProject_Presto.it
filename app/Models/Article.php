<?php

namespace App\Models;


use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
   use HasFactory, Searchable;


   public function toSearchableArray()
   {
      $category = $this->category;
      $array =[
         'id'=>$this->id,
         'description'=>$this->description,
         'price'=>$this->price,
         'name'=>$this->name,
         'category'=>$category,
      ];
      return $array;
   }


   protected $fillable = [
    'name',
    'description',
    'price',
    'category'
   ];

   public function category(){
      return $this->belongsTo(Category::class);
   }

   public function user(){
      return $this->belongsTo(User::class);
   }

   public function setAccpted($value){
      $this->is_accepted = $value;
      $this->save();
      return true;
   }
   public static function toBeRevisionedCount(){
      return Article::where('is_accepted', null)->count();
   }

   public function images() {
      return $this->hasMany(Image::class);
   }
}
