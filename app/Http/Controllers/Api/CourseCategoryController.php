<?php

namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseCategoryRequest;
use App\Http\Resources\CourseCategoryResource;

class CourseCategoryController extends Controller
{
    public function index(Course $course)
    {
        return new CourseCategoryResource($course);
    }

    public function store(CourseCategoryRequest $request, Course $course)
    {
        $changed = $course->categories()->sync($request->categories);
        $categoriesAttachedId = $changed['attached'];
        $categories = Category::whereIn('id', $categoriesAttachedId)->get();

        return $categories->count() ? response()->json(new CourseCategoryResource($course), 201) : [];
    }

    public function destroy(Course $course, Category $category)
    {
        $course->categories()->detach($category->id);
        return response()->json([], 204);
    }
}
