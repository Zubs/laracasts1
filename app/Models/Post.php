<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = ['title', 'excerpt', 'body', 'slug'];

    // Fields that cannot be mass assigned
    protected $guarded = ['id'];

    protected $dates = ['created_at'];

    public function user () {
        return $this->belongsTo(User::class, 'author');
    }
}
