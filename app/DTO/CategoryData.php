<?php

namespace App\DTO;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Unique;
use Spatie\LaravelData\Data;

class CategoryData extends Data
{
    public function __construct(
        #[Max(255), Unique('categories', 'name')]
        public string $name,
        public $movies = null,
    ) {}
}
