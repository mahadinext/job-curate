<?php

namespace App\Models\v1\careepick\JobSeeker;

use App\Models\v1\careepick\Skills;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JobSeekerSkills extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'job_seeker_id',
        'skill_id',
        'slug',
        'remarks',
    ];

    /**
     * Add skills for a job seeker.
     *
     * @param array $data
     * @return void
     */
    public static function addSkills($data)
    {
        // Loop through each skill_id and save it for the job seeker
        foreach ($data['skill_id'] as $skillId) {
            self::create([
                'job_seeker_id' => $data['job_seeker_id'],
                'skill_id' => $skillId,
                // You can add other attributes here if needed
            ]);
        }
    }

    protected $table = 'job_seeker_skills';

    public function skills()
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }
}
