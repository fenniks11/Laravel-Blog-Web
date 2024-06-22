<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search) use ($filters) {
            $query->where(function($query) use ($filters, $search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function($query, $category) use ($filters) {
            $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        $query->when($filters['author'] ?? false, function($query, $author) use ($filters) {
            $query->whereHas('author', function($query) use ($author){
                $query->where('username', $author);
            });
        });
    }

    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
     return 'slug';   
    }


}
