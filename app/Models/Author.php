<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\Hasfactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\RelationS\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Author extends Model
{
    use Hasfactory, SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'slug',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function news(): HasMany
    {
        return $this->hasMany(ArticleNews::class);
    }
}
