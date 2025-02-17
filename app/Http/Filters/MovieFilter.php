<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class MovieFilter extends QueryFilter
{
    public function createdAt($value): Builder
    {
        // www.example.com/api/v1/tickets?createdAt=2022-01-01, 2022-01-31
        $dates = explode(',', (string) $value);

        if (count($dates) > 1) {
            return $this->builder->whereBetween('created_at', $dates);
        }

        return $this->builder->whereDate('created_at', $value);
    }

    public function title($value): Builder
    {
        return $this->builder->where('title', 'like', "%{$value}%");
    }

    public function director($value): Builder
    {
        return $this->builder->where('director', 'like', "%{$value}%");
    }

    public function releaseDate($value): Builder
    {
        return $this->builder->where('release_date', 'like', "%{$value}%");
    }

    public function synopsis($value): Builder
    {
        return $this->builder->where('synopsis', 'like', "%{$value}%");
    }

    public function category($value): Builder
    {
        $categories = explode(',', (string) $value);

        return $this->builder->whereHas('category', function ($query) use ($categories) {
            $query->whereIn('name', $categories);
        });
    }
}
