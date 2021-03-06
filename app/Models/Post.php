<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = [
        'title',
        'body',
        'excerpt',
        'slug',
        'category_id',
        'user_id',
        'thumbnail'
    ];

    // Fields that cannot be mass assigned
    protected $guarded = ['id'];

    // Dates that may be formatted to be human readable
    protected $dates = ['created_at'];

    // Relationships that'd always be auto-loaded
    // protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where(fn ($query) =>
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('body', 'like', '%' . $filters['search'] . '%')
            );
        }

        if ($filters['category'] ?? false) {
            $query->whereHas('category', fn ($query) => $query->where('slug', $filters['category']));
        }

        if ($filters['author'] ?? false) {
            $query->whereHas('author',
                fn ($query) =>
                $query
                    ->where('username', $filters['author']))
                    ->orWhere('slug', $filters['author']);
        }
    }

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function setExcerptAttribute()
    {
        $this->attributes['excerpt'] = Str::words($this->attributes['body'], 50);
    }

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->attributes['title']);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    // Changes the key to be used to find when using route model binding
//    public function getRouteKeyName()
//    {
//        return 'slug'; // TODO: Change the autogenerated stub
//    }
}
