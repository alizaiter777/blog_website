<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'image',
        'userId',
        'categoryId',
    ];

    /**
     * Define the relationship to the User model.
     * Each post belongs to one user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Define the relationship to the Category model.
     * Each post belongs to one category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'postId');
    }
}
