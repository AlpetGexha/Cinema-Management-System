<?php

namespace App\Models;

use App\Http\Filters\QueryFilter;
use App\Traits\HasUserId;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    use HasFactory, HasUserId;

    //        Sluggable;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        //        'slug',
        'director',
        'release_date',
        'synopsis',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

    //    public function sluggable(): array
    //    {
    //        return [
    //            'slug' => [
    //                'source' => 'title'
    //            ]
    //        ];
    //    }
}
