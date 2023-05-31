<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
    ];

    protected $appends = [
        'postsCount'
    ];

    public function getPostsCountAttribute()
    {
        $posts = ContentMeta::where('key', '=', 'resource-category')
            ->where('value', '=', $this->id)
            ->get();

        return count($posts);
    }

    /**
     * Get the options for generating the slug.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function boot()
    {
        parent::boot();
        // updating created_by and updated_by when model is created
        static::creating(function ($model) {
            if (!$model->isDirty('created_by') && Auth::check()) {
                $model->created_by = Auth::id();
            }
        });
        // updating updated_by when model is updated
        static::updating(function ($model) {
            if (!$model->isDirty('updated_by') && Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }
}
