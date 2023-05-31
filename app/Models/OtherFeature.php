<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class OtherFeature extends Model
{
    use HasFactory;
    use SoftDeletes;

protected $fillable = [
    'sub_solutions_id',
    'features',
];

function sub_solution(): BelongsTo{
    return $this->belongsTo(SubSolution::class);
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
