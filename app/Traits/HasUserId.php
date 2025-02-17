<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait HasUserId
{
    protected static function bootHasUserId(): void
    {
        static::creating(function (Model $model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
            }
        });
    }
}
