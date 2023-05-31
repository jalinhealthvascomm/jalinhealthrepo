<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SubSolution extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'solution_id',
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

    function solution(): BelongsTo{
        return $this->belongsTo(Solution::class);
    }

    function otherFeature(): HasMany{
        return $this->hasMany(OtherFeature::class);
    }

    function other_features(): HasMany{
        return $this->hasMany(OtherFeature::class);
    }

    function features(): HasMany{
        return $this->hasMany(Feature::class);
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
