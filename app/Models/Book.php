<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;
use App\Models\{User,Author,Category};
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','description','author_id','category_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
   {
    return $this->belongsToMany(User::class,'borrows')->withTimestamps()->withPivot('created_at','returned_at');
   }
}
