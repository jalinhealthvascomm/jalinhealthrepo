<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Solution extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'icon',
        'image',
        'description',
        'detail',
        'slug',
        'seo_title',
        'seo_description',
        'seo_Keywords'
    ];

    function subSolutions(): HasMany {

        return $this->hasMany(SubSolution::class);
    }

    function sub_solutions(): HasMany {

        return $this->hasMany(SubSolution::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
