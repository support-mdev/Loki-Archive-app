<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'source', 
        'title', 
        'category', 
        'origin', 
        'contact', 
        'website', 
        'tags', 
        'description', 
        'image', 
        ];

    public function scopeFilter($query, array $filters)
    {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if($filters['search'] ?? false) {
            $query->where(function ($query) use ($filters) {
                $query->where('title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
            });
        }

        if ($filters['category'] ?? false) {
            $query->where('category', $filters['category']);
        }
        
    }

        //Relationship with User
        public function user() {
            return $this->belongsTo(User::class, 'user_id');
        }
}
