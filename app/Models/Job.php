<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function($query, $value) {
            $query->where(function($query) use ($value) {
                $query->where('title', 'like', '%'.$value.'%')
                    ->orWhere('description', 'like', '%'.$value.'%');
            });
        })->when($filters['min_salary'] ?? null, function($query, $value) {
            $query->where('salary', '>=', $value);
        })->when($filters['max_salary'] ?? null, function($query, $value) {
            $query->where('salary', '<=', $value);
        })->when($filters['experience'] ?? null, function($query, $value) {
            $query->where('experience', $value);
        })->when($filters['category'] ?? null, function($query, $value) {
            $query->where('category',$value);
        });
    }
}
