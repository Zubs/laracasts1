<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCreatedAtAttribute()
    {
        $date = Carbon::parse($this->attributes['created_at'])->diffForHumans();

        if ($this->attributes['created_at'] < Carbon::now()->subDays(7)) $date = Carbon::parse()->format('F j, Y, g:i a');

        return $date;
    }
}
