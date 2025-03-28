<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'category';
    protected $with = ['stories'];

    public function stories(): HasMany
    {
        return $this->hasMany(Stories::class);
    }
}
