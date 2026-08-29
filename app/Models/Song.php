<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'lyrics',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function scopeSearch($query, ?string $term)
    {
        if (! $term) {
            return $query;
        }

        return $query->where(function ($query) use ($term) {
            $query->where('title', 'like', "%{$term}%")
                ->orWhere('artist', 'like', "%{$term}%");
        });
    }

    public function scopeSort($query, ?string $sort)
    {
        return match ($sort) {
            'title' => $query->orderBy('title'),
            'artist' => $query->orderBy('artist'),
            'oldest' => $query->oldest(),
            default => $query->latest(),
        };
    }
}