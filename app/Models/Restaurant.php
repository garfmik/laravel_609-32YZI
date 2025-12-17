<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city', 'address', 'cuisine', 'avg_price', 'work_hours', 'phone', 'img', 'rating'];


    public function reviews(): HasMany
    {
        return $this->hasMany(related: Review::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'favorites');
    }
}
