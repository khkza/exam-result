<?php

namespace App\Models;

use App\Models\Region;
use App\Models\Quarter;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Township extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region_id'
    ];

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }


 public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }





}
