<?php

namespace App\Http\Controllers\Api;

use App\Common\OnlyTrashed;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    use OnlyTrashed;

    public function index(Request $request)
    {
        $query = Course::query();
        $query = $this->onlyTrashed($request, $query);
        $courses = $query->paginate(10);
        return CourseResource::collection($courses);
    }

    public function store(CourseRequest $request)
    {
        $course = Course::create($request->all());
        $course->refresh();

        return new CourseResource($course);
    }

    public function show(Course $course)
    {
        return new CourseResource($course);
    }

    public function update(CourseRequest $request, Course $course)
    {
        $course->fill($request->all());
        $course->save();

        return new CourseResource($course);
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return response()->json([], 204);
    }
}
