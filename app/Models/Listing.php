<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    /** @use HasFactory<\Database\Factories\ListingFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'tags',
        'email',
        'link',
        'image',
        'approved',
    ];

    protected $casts = [
        'approved' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Local scope for search query
    public function scopeFilter(Builder $query, array $filters)
    {
        // if ($filters['search'] ?? false) {
        //     $query->where(function ($q) use ($filters) {
        //         $q->where('title', 'like', '%' . $filters['search'] . '%')
        //             ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        //     });
        // }

        // if ($filters['user_id'] ?? false) {
        //     $query->where('user_id', $filters['user_id']);
        // }

        // if ($filters['tag'] ?? false) {
        //     $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        // }

        $query
            ->when($filters['search'] ?? false, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($filters['user_id'] ?? false, function ($q, $user_id) {
                $q->where('user_id', $user_id);
            })
            ->when($filters['tag'] ?? false, function ($q, $tag) {
                $q->where('tags', 'like', "%{$tag}%");
            });
    }
}
