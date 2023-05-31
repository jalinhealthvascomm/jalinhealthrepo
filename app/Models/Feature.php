<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feature extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'sub_solution_id',
        'features',
        'description'
    ];

    function sub_solution(): BelongsTo{
        return $this->belongsTo(SubSolution::class);
    }
}
