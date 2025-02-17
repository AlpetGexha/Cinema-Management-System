<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Builder $builder;
    protected ?array $sortable = [];

    public function __construct(protected Request $request) {}

    public function apply(Builder $builder): Builder
    {
        $this->builder = $builder;

        foreach ($this->request->all() as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $builder;
    }

    protected function filter(array $arr): Builder
    {
        foreach ($arr as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
            // if we dont have a method for the key, we can just make a simple filter
            //            else {
            //                $this->builder->where($key, 'like', $value);
            //            }
        }

        return $this->builder;
    }

    protected function sort($value): void
    {
        $sortAttributes = explode(',', (string) $value);

        foreach ($sortAttributes as $sortAttribute) {
            $direction = 'asc';

            if (str_starts_with($sortAttribute, '-')) {
                $direction = 'desc';
                $sortAttribute = substr($sortAttribute, 1);
            }

            if (! in_array($sortAttribute, $this->sortable) && ! array_key_exists($sortAttribute, $this->sortable)) {
                continue;
            }

            $columnName = $this->sortable[$sortAttribute] ?? null;

            if ($columnName === null) {
                $columnName = $sortAttribute;
            }

            $this->builder->orderBy($columnName, $direction);
        }
    }
}
