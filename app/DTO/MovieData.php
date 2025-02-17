<?php

namespace App\DTO;

use Spatie\LaravelData\Attributes\Validation\Date;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class MovieData extends Data
{
    public function __construct(
        #[Max(255)]
        public string $name,
        #[Max(255)]
        public string $title,
        #[Max(255)]
        public string $director,
        #[Date]
        public string $release_date,
        #[Max(255)]
        public string $synopsis,
        public int $category_id,
    ) {
        //
    }
}
