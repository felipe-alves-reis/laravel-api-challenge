<?php

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();

        factory(Course::class, 10)
            ->create()
            ->each(function(Course $course) use($categories) {
                $categoryId = $categories->random()->id;
                $course->categories()->attach($categoryId);
            });
    }
}
