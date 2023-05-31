<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Resource extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    
    protected $table = 'site_contents';
    protected $appends = [
        'resourceCategory',
        'relateTag'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'slug',
        'content_type',
        'image',
        'content',
        'excerpt',
        'status',
        'parent',
        'seo_title',
        'seo_description',
        'seo_Keywords'
    ];

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

    /**
     * Get the meta data for the model.
     *
     * @return array
     */
    function contentMetas(): HasMany{
        return $this->hasMany(ContentMeta::class, 'site_content_id', 'id');
    }

    function content_metas(): HasMany{
        return $this->hasMany(ContentMeta::class, 'site_content_id', 'id');
    }

    /**
     * Get the child for the model.
     *
     * @return array
     */
    public function childs() : HasMany {
        return $this->hasMany(SiteContent::class,'parent','id');
    }

    /**
     * Get the features for the model.
     *
     * @return array
     */
    public function contentFeatures() : HasMany {
        return $this->hasMany(ContentFeature::class,'site_content_id','id');
    }

    public function getResourceCategoryAttribute()
    {
        $resourceCategory = null;
        foreach ($this->contentMetas as $key => $value) {
            if ($value->key === 'resource-category') {
                $resourceCategory = Category::where('id', '=', $value->value)->firstOrFail() ?? 1;
            }
        }

        return $resourceCategory;
    }
    public function getRelateTagAttribute()
    {
        $contentMeta = null;
        foreach ($this->contentMetas as $key => $value) {
            if ($value->key === 'tag-relate') {
                $contentMeta = $value;
            }
        }

        return $contentMeta;
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
