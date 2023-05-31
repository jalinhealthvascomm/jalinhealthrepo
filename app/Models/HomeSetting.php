<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class HomeSetting extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'name',
        'type',
    ];

    function elements(): HasMany {

        return $this->hasMany(PageElement::class);
    }
    
    function page_elements(): HasMany {
        return $this->hasMany(PageElement::class);
    }

    function discoverItems(): HasMany {

        return $this->hasMany(DiscoverItem::class);
    }

    function discover_items(): HasMany {
        return $this->hasMany(DiscoverItem::class);
    }

    public function getRouteKeyName(): string
    {
        return 'name';
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
