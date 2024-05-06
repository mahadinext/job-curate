<?php

namespace App\Models\v1\careepick;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobCategory extends Model
{
    use HasFactory;

    /**
     * Get the jobs associated with the category.
     */
    public function jobs()
    {
        return $this->hasMany(Jobs::class, 'job_category_id');
    }

    /**
     * Get the count of jobs associated with the category.
     */
    public function getJobCountAttribute()
    {
        return $this->jobs()->count();
    }
}
