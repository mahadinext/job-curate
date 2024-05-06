<?php

namespace App\Models;

use App\Models\Jobs;
use App\Models\v1\careepick\Skills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobRequiredSkills extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_id',
        'skill_id',
    ];

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }

    /**
     * Add skills for a job seeker.
     *
     * @param array $data
     * @return void
     */
    public static function addSkills($jobId, $skillSets)
    {
        // Loop through each skill_id and save it for the job seeker
        foreach ($skillSets as $skill) {
            self::create([
                'job_id' => $jobId,
                'skill_id' => $skill,
            ]);
        }
    }
}
