<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function category()
{
    return $this->belongsTo(Category::class, 'categoryId');
}
public function posts()
{
    return $this->hasMany(Post::class);
}

}
