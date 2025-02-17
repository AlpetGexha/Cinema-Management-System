<?php

namespace App\Http\Controllers\Api;

use App\DTO\CategoryData;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends APIController
{
    public function index(): JsonResponse
    {
        Gate::authorize('viewAny', Category::class);

        $categories = Category::query()
//            ->select('id','name')
            ->when(request('name'), function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%");
            })->get();

        return $this->success(CategoryData::collect($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        Gate::authorize('create', Category::class);

        $data = Category::create(CategoryData::from($request)->toArray());

        return $this->success($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        Gate::authorize('view', Category::class);

        $data = Category::with('movies')->findOrFail($id);

        return $this->success(CategoryData::from($data));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        Gate::authorize('update', Category::class);

        $data = Category::findOrFail($id);

        $data->update(CategoryData::from($request)->toArray());

        return $this->success($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        Gate::authorize('delete', Category::class);

        $data = Category::findOrFail($id);

        $data->delete();

        return $this->success($data);
    }
}
