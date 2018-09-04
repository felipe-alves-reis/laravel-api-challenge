<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Sluggable, SoftDeletes;

    protected $fillable = ['name'];
    protected $dates = ['deleted_at'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
