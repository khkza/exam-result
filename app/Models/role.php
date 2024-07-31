<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class role extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'level',
        'permissions',
    ];

    protected $casts = [
        'permissions' => 'array'
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
}
