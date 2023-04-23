<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    public function lecturers(): HasMany
    {
        return $this->hasMany(Lecturer::class);
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
