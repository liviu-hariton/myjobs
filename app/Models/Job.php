<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];

    public static array $category = ['IT', 'Finance', 'Sales', 'Marketing'];

    protected $fillable = [
        'title', 'description', 'salary', 'location', 'experience', 'category'
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied(Authenticatable|User|int $user)
    {
        return $this->where('id', $this->id)
            ->whereHas('JobApplications', fn($query) => $query->where('user_id', '=', $user->id ?? $user))
            ->exists();
    }

    public function scopeFilter(Builder|QueryBuilder $query, array $filters): Builder|QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function($query, $value) {
            $query->where(function($query) use ($value) {
                $query->where('title', 'like', '%'.$value.'%')
                    ->orWhere('description', 'like', '%'.$value.'%')
                    ->orWhereHas('employer', function($query) use ($value) {
                        $query->where('company_name', 'like', '%'.$value.'%');
                    });
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
