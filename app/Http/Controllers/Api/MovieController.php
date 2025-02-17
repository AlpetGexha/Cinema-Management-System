<?php

namespace App\Http\Controllers\Api;

use App\DTO\MovieData;
use App\Http\Filters\MovieFilter;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MovieController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(MovieFilter $filter): JsonResponse
    {

        Gate::authorize('viewAny', Movie::class);

        $movie = Movie::query()
            ->filter($filter)
            ->get();

        return $this->success($movie);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        Gate::authorize('create', Movie::class);

        $data = MovieData::from($request)->toArray();

        $movie = Movie::create($data);

        return $this->success($movie);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        Gate::authorize('view', Movie::class);

        $movie = Movie::findOrFail($id);

        return $this->success($movie);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        Gate::authorize('update', Movie::class);

        $movie = Movie::findOrFail($id);

        $movie->update(MovieData::from($request)->toArray());

        return $this->success($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Gate::authorize('delete', Movie::class);

        $movie = Movie::findOrFail($id);

        $movie->delete();

        return $this->success($movie, 'Movie deleted successfully');
    }
}
